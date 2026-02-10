<?php

namespace App\Services;

use App\Models\Shop\Order\Order;
use App\Status\Status;
use Illuminate\Support\Facades\DB;

class StatusService
{
    private $service;
    public function __construct()
    {
        $this->service = new ModificationProductService();
    }

    public function setStatus(Order $order, $status, $track_code = null)
    {
        return DB::transaction(function () use ($order, $status, $track_code)
        {
            $order->statuses->transitionTo(Status::createStatus((int) $status, $order));
            $order->setTrackCode($track_code);
            $order->orderSave();
        });
    }

    public function setPrintStatus($order_id)
    {
        return DB::transaction(function () use ($order_id)
        {
            $order = Order::find($order_id);
            if ($order->isNew() || $order->isPaid()) {
                $this->setStatus($order->id, Status::FORMED);
            }
        });

    }

//    public function isFormed ($order)
//    {
//        return array_search(Status::FORMED, array_column($order->statuses_json, 'value'));
//    }

//    public function remove($order)
//    {
//        if ($order->isCompleted() || $order->isPreliminsry() || $order->isCancelled() || $order->isCancelledByCustomer()){
//            return;
//        }
//        $this->returnQuantity($order);
//        $this->returnInStock($order);
//    }
//
    public function returnQuantity(Order $order): void
    {
        foreach ($order->items as $item){
            $this->service->returnQuantity($item, $item->quantity);
        }
    }

    public function checkoutQuantity(Order $order): void
    {
        foreach ($order->items as $item){
            $this->service->checkoutQuantity($item, $item->quantity, true);
        }
    }

    public function returnInStock (Order $order): void
    {
        foreach ($order->items as $item){
            $this->service->returnInStock($order, $item, $item->quantity);
        }
    }

    public function checkoutInStock(Order $order): void
    {
        foreach ($order->items as $item){
            $this->service->checkoutInStock($item, $item->quantity);
        }
    }
}
