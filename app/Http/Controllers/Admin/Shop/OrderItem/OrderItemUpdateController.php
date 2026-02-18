<?php

namespace App\Http\Controllers\Admin\Shop\OrderItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrdersItemUpdateRequest;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;
use App\Services\OrderItemService;

class OrderItemUpdateController extends Controller
{
    public function __invoke(OrdersItemUpdateRequest $request, OrderItemService $service, Order $order)
    {
        try {
//            if ($order->isCompleted()) {
//                throw new \RuntimeException('Заказ закрыт.');
//            }
            $request->quantity == 0
                ? $service->deleteItem($request, $order)
                : $service->updateItem($request, $order);

            $items = OrderItem::getOrderSortedByItems($order);
            $quantityByModifications = OrderItem::getQuantityByModifications($items);

            return ['success' => [
                    'order_table' => view('admin.shop.order.partials.order-table', compact('items', 'quantityByModifications', 'order'))->render(),
                ]
            ];

//            return redirect()->route('orders.edit', $order)->with('status', 'Изменения сохранены');
        } catch (\Exception $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
