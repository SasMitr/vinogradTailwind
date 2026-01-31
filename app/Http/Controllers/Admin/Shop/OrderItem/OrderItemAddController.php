<?php

namespace App\Http\Controllers\Admin\Shop\OrderItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\OrdersAddItemRequest;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Order\OrderItem;
use App\Models\Shop\Product;
use App\Services\OrderItemService;
use Illuminate\Http\Request;

class OrderItemAddController extends Controller
{
    public function show(Order $order): array
    {
        try {
            if ($order->isCompleted()) {
                throw new \RuntimeException('Заказ закрыт.');
            }
            $products = Product::allProducts();
            return [
                'body' => view('admin.shop.order.partials.order_item_add_form', compact('order', 'products'))->render(),
                'header' => 'Добавляем в заказ'
            ];

        } catch (\Exception $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }

    public function add(OrdersAddItemRequest $request, Order $order, OrderItemService $service)
    {
        try {
            $order->load('items.modification.property');
            $item = $service->addItem($request, $order);
            $order->refresh();

            $items = OrderItem::getOrderSortedByItems($order);
            $quantityByModifications = OrderItem::getQuantityByModifications($items);
            $item->load('product.adminModifications.property');

            return ['success' => [
                    'order_table' => view('admin.shop.order.partials.order-table', compact('items', 'quantityByModifications', 'order'))->render(),
                    'modifications_bloc' => view('admin.shop.order.partials.order_items_modifications', ['product' => $item->product, 'order' => $order])->render()
                ]
            ];
        } catch (\DomainException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
