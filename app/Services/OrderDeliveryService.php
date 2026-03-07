<?php

namespace App\Services;

use App\Models\DTO\CustomerData;
use App\Models\Shop\Order\DeliveryData;
use App\Models\Shop\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDeliveryService
{
    private function newDeliveryData($request)
    {
        $per = new DeliveryData($request->input('delivery.method'));
        $per->setAddress($request->input('delivery.index'), $request->input('delivery.address'));
        $per->setWeight($this->cart->getWeight());
        return $per;
    }

    public function setDeliveryData(Order $order): DeliveryData
    {
        $per = new DeliveryData($order->delivery['method_id']);
        $per->setAddress($order->delivery['index'], $order->delivery['address']);
        $per->setWeight($order->getWeight());
        return $per;
    }

    private function updateDeliveryData(Request $request, Order $order): DeliveryData
    {
        $delivery = new DeliveryData($request->input('delivery.method'));
        $delivery->setAddress(
            $request->input('delivery.index', $order->delivery['index']),
            $request->input('delivery.address', $order->delivery['address'])
        );
        $delivery->setWeight($order->getWeight());
        return $delivery;
    }

    public function deliveryUpdate(Request $request, Order $order): Order
    {
        return DB::transaction(function() use ($request, $order)
        {
            $order->delivery = $this->updateDeliveryData($request, $order);
            $order->customer = CustomerData::fromRequest($request);
            $order->save();
            return $order;
        });
    }
}
