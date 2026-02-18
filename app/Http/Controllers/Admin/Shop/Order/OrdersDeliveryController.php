<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CheckoutRequest;
use App\Models\Shop\DeliveryMethod;
use App\Models\Shop\Order\Order;
use App\Services\OrderDeliveryService;

class OrdersDeliveryController extends Controller
{
    public function show(DeliveryMethod $delivery, Order $order)
    {
        return [
            'success' => [
                'body' => view('admin.shop.order.partials.delivery_update_form', ['delivery' => $delivery, 'order' => $order])->render(),
                'header' => $delivery->name
            ]
        ];
    }

    public function update(CheckoutRequest $request, OrderDeliveryService $service, Order $order)
    {
        try {
            $service->deliveryUpdate($request, $order);
            return [
                'success' => view('admin.shop.order.partials.delivery_data', ['order' => $order])->render(),
                'orderCost' => $order->getTotalCost()->__toString(),
            ];
        } catch (\DomainException $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
