<?php

namespace App\Services;

use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Collection;

readonly class ModificationProductService
{
    public function __construct(private Order $order) {}

    public function handler (string $action, Collection|array $items, int $quantity = null): void
    {
        if(!$this->order->isPreliminsry()) {
            foreach ($items as $item) {
                $this->$action($item, $quantity ?: $item->quantity);
                $item->modification->save();
            }
        }
    }

    public function transitionToPre(Collection $items): void
    {
        foreach ($items as $item) {
            $this->returnQuantity($item, $item->quantity);
            $this->returnInStock($item, $item->quantity);
            $item->modification->save();
        }
    }

    public function remove($order): void
    {
//        if (!$order->isCompleted() || !$order->isPreliminsry() || !$order->isCancelled() || !$order->isCancelledByCustomer()) {
//            foreach ($order->items as $item){
//                $this->returnQuantity($item, $item->quantity);
//                $this->returnInStock($item, $item->quantity);
//            }
//        }
    }

    private function returnQuantity($item, $quantity): void
    {
        $item->modification->returnQuantity($quantity);
    }

    private function checkoutQuantity($item, $quantity): void
    {
        $item->modification->checkout($quantity, $this->order->isPreliminsry());
    }

    private function returnInStock ($item, $quantity): void
    {
        if($this->order->isGistoryFormed()) {
            $item->modification->returnInStock($quantity);
        }
    }

    private function checkoutInStock($item, $quantity): void
    {
        if($this->order->isGistoryFormed()) {
            $item->modification->checkoutInStock($quantity);
        }
    }
}
