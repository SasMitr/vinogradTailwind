<?php

namespace App\Status;

use App\Services\ModificationProductService;
use Illuminate\Support\Arr;

final class CancelledOrderState extends OrderState
{
    protected $allowedStatuses = [
        Status::NEW
    ];

    function value(): string
    {
        return Status::CANCELLED;
    }

    function humanValue(): string
    {
        return Arr::get(Status::list(), Status::CANCELLED);
    }

    function actions(): void
    {
        $MPS = new ModificationProductService ($this->order);
        $MPS->handler('returnQuantity', $this->order->items);
        $MPS->handler('returnInStock', $this->order->items);
    }

    protected function getAllowedStatuses(): array
    {
        return [
            Status::NEW => 'Новый'
        ];
    }
}
