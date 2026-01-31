<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;
use App\Models\Shop\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderShowController extends Controller
{
    public function __invoke(Request $request, Order $order)
    {
        $currencys = $order->cost->currencyList();
        $items = OrderItem::getOrderSortedByItems($order);
        $quantityByModifications = OrderItem::getQuantityByModifications($items);

        return view('admin.shop.order.show', [
            'order' => $order,
            'items' => $items,
            'quantityByModifications' => $quantityByModifications,
            'other_orders' => OrderService::getOtherOrders($order), //  Получить другие заказы клиента
            'currencys' => $currencys
        ]);
    }
}
