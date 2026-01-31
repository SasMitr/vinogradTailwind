<?php

namespace App\Services;

use App\Models\Shop\Modification;
use App\Models\Shop\ModificationProduct;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemService
{
    public function addItem(Request $request, Order $order, $pre = false)
    {
        return DB::transaction(function() use ($request, $order, $pre)
        {
            $modification = ModificationProduct::find($request->modification_id);

            if(!$pre){
                $modification->checkout($request->quantity, $pre);
                $modification->save();
            }

            $item = OrderItem::updateOrCreate(
                ['order_id' => $order->id, 'product_id' => $modification->product->id, 'modification_id' => $modification->id],
                ['price' => $modification->price, 'quantity' => DB::raw("quantity + $request->quantity")]
            );


            $order->cost = $order->cost->raw() + $request->quantity * $modification->price->raw();
            $order->delivery = (new OrderDeliveryService)->setDeliveryData($order);
            $order->save();
            return $item;
        });
    }

    public function updateItem(Request $request, Order $order, $pre = false)
    {
        return DB::transaction(function() use ($request, $order, $pre)
        {
            $item = OrderItem::query()->find($request->item_id);
            if($item->quantity != $request->quantity) {

                if(!$pre) {
                    $MPService = new ModificationProductService();

                    //  Уменьшаем
                    if ($item->quantity > $request->quantity) {
                        $MPService->returnQuantity($item, $item->quantity - $request->quantity);
                        $MPService->returnInStock($order, $item, $item->quantity - $request->quantity);
                    }

                    //  Добавляем
                    elseif ($item->quantity < $request->quantity) {
                        $MPService->checkoutQuantity($item, $request->quantity - $item->quantity, $pre);
                        $MPService->checkoutInStock($item, $request->quantity - $item->quantity);
                    }
                }

                $item->quantity = $request->quantity;
                $item->save();
                return $this->newOrderCost($order, 0);
            }

        });
    }

    public function deleteItem($request, $order, $pre = false)
    {
        return DB::transaction(function() use ($request, $order, $pre)
        {
            $item = OrderItem::query()->find($request->item_id);
            if(!$pre) {
                $MPService = new ModificationProductService();

                $MPService->returnQuantity($item, $item->quantity - $request->quantity);
                $MPService->returnInStock($order, $item, $item->quantity - $request->quantity);
            }
            $item->delete();
            return $this->newOrderCost($order, $request->item_id);
        });
    }

    private function newOrderCost(Order $order, $item_id)
    {
//        dd($order->items->toArray());
//        $order->refresh();
        $order->cost = array_sum(array_map(function ($item) use($item_id) {
            if ($item['id'] == $item_id) return 0;
            return $item['price']->raw() * $item['quantity'];
        }, $order->items->toArray()));
        $order->delivery = (new OrderDeliveryService)->setDeliveryData($order);
        $order->save();
        return true;
    }
}
