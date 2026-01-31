<?php

namespace App\Services;

use App\Status\Status;

class ModificationProductService
{
    public function remove($order): void
    {
        if ($order->isCompleted() || $order->isPreliminsry() || $order->isCancelled() || $order->isCancelledByCustomer()){
            return;
        }
        foreach ($order->items as $item){
            $this->returnQuantity($item, $item->quantity);
            $this->returnInStock($order, $item, $item->quantity);
        }
    }

    public function returnQuantity($item, $quantity): void
    {
        $item->modification->returnQuantity($quantity);
        $item->modification->save();
    }

    public function checkoutQuantity($item, $quantity, $pre): void
    {
        $item->modification->checkout($quantity, $pre);
        $item->modification->save();
    }

    public function returnInStock ($order, $item, $quantity): void
    {
        if($this->isFormed($order)) {
            $item->modification->returnInStock($quantity);
            $item->modification->save();
        }
    }

    public function checkoutInStock($item, $quantity): void
    {
        $item->modification->checkoutInStock($quantity);
        $item->modification->save();
    }

    private function isFormed ($order): bool
    {
        return array_search(Status::FORMED, array_column($order->statuses_json, 'value'));
    }
}
