<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;

class OrderCopyController extends Controller
{
    public function __invoke(Order $order)
    {
        try {
            $items = OrderItem::getOrderSortedByItems($order);
            $quantityByModifications = OrderItem::getQuantityByModifications($items);

            return [
                'success' =>  view('admin.shop.order.partials.order-copy', compact('items', 'quantityByModifications', 'order'))->render(),
            ];

        } catch (\Exception $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
