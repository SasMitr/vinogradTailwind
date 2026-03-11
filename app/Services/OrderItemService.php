<?php

namespace App\Services;

use App\Models\Shop\ModificationProduct;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemService
{
    public function addItem(Request $request, Order $order)
    {
        return DB::transaction(function() use ($request, $order)
        {
            $modification = ModificationProduct::find($request->modification_id);

//            if(!$order->isPreliminsry()){
//                $modification->checkout($request->quantity);
//                if ($order->isGistoryFormed()) {
//                    $modification->checkoutInStock($request->quantity);
//                }
//                $modification->save();
//            }

            $item = OrderItem::updateOrCreate(
                ['order_id' => $order->id, 'product_id' => $modification->product->id, 'modification_id' => $modification->id],
                ['price' => $modification->price, 'quantity' => DB::raw("quantity + $request->quantity")]
            );

            $MPService = new ModificationProductService($order);
            $MPService->handler('checkoutQuantity', [$item], $request->quantity);
            $MPService->handler('checkoutInStock', [$item], $request->quantity);

            $order->cost = $order->cost->raw() + $request->quantity * $modification->price->raw();
            $order->delivery = (new OrderDeliveryService)->setDeliveryData($order);
            $order->save();

            return $item;
        });
    }

    public function updateItem(Request $request, Order $order)
    {
        return DB::transaction(function() use ($request, $order)
        {
            $item = OrderItem::query()->find($request->item_id);
            if($item->quantity == $request->quantity) return;

            $MPService = new ModificationProductService($order);

            //  Уменьшаем
            if ($item->quantity > $request->quantity) {
                $MPService->handler('returnQuantity', [$item], $item->quantity - $request->quantity);
                $MPService->handler('returnInStock', [$item], $item->quantity - $request->quantity);
            }

            //  Добавляем
            if ($item->quantity < $request->quantity) {
                $MPService->handler('checkoutQuantity', [$item], $request->quantity - $item->quantity);
                $MPService->handler('checkoutInStock', [$item], $request->quantity - $item->quantity);
            }

            $item->quantity = $request->quantity;
            $item->save();
            return $this->newOrderCost($order, 0);
        });
    }

    public function deleteItem($request, $order)
    {
        return DB::transaction(function() use ($request, $order)
        {
            $item = OrderItem::query()->find($request->item_id);
            if(!$order->isPreliminsry()) {

                $MPService = new ModificationProductService($order);
                $MPService->handler('returnQuantity', [$item], $item->quantity - $request->quantity);
                $MPService->handler('returnInStock', [$item], $item->quantity - $request->quantity);
            }
            $item->delete();
            return $this->newOrderCost($order, $request->item_id);
        });
    }

    private function newOrderCost(Order $order, $item_id)
    {
        $order->cost = array_sum(array_map(function ($item) use($item_id) {
            if ($item['id'] == $item_id) return 0;
            return $item['price']->raw() * $item['quantity'];
        }, $order->items->toArray()));
        $order->delivery = (new OrderDeliveryService)->setDeliveryData($order);
        $order->save();
        return true;
    }
}
