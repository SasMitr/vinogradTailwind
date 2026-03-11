<?php

namespace App\Status;

use App\Services\ModificationProductService;
use Illuminate\Support\Arr;

final class Cancelled_By_CustomerOrderState extends OrderState
{
    protected $allowedStatuses = [
        Status::NEW
    ];

    function value(): string
    {
        return Status::CANCELLED_BY_CUSTOMER;
    }

    function humanValue(): string
    {
        return Arr::get(Status::list(), Status::CANCELLED_BY_CUSTOMER);
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
