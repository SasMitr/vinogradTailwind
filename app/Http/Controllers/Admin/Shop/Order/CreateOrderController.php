<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\CreateOrderRequest;
use App\Services\OrderService;
use App\Status\Status;

class CreateOrderController extends Controller
{
    public function form ($status): array
    {
        return [
            'success' => [
                'body' => view('admin.shop.order.partials.create_order_customer_form', ['status' => $status])->render(),
                'header' => $status == Status::NEW ? 'Создание нового заказа' : 'Создание предварительного заказа'
            ]
        ];

    }

    public function create (CreateOrderRequest $request, OrderService $service, $status): array
    {
        try {
            $order = $service->createNewOrder($request, $status);
            return [
                'success' =>  route('admin.orders.order', $order)
            ];

        } catch (\Exception $e) {
            return ['errors' => [$e->getMessage()]];
        }
    }
}
