<?php

namespace App\Services;

use App\Models\Shop\Order\Order;
use App\Status\Status;
use Illuminate\Support\Facades\DB;

class StatusService
{

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
}
