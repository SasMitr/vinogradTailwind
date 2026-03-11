<?php

namespace App\Status;

use App\Services\ModificationProductService;
use Illuminate\Support\Arr;

final class NewOrderState extends OrderState
{
    protected $allowedStatuses = [
        Status::PAID,
//        Status::SENT,
//        Status::COMPLETED,
        Status::CANCELLED,
//        Status::CANCELLED_BY_CUSTOMER,
        Status::PRELIMINARY,
        Status::FORMED
    ];

    public function value(): string
    {
        return Status::NEW;
    }

    public function actions(): void
    {
        (new ModificationProductService ($this->order))
            ->handler('checkoutQuantity', $this->order->items);
    }

    public function humanValue(): string
    {
        return Arr::get(Status::list(), Status::NEW);
    }
}
