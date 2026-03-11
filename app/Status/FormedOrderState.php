<?php

namespace App\Status;

use App\Services\ModificationProductService;
use Illuminate\Support\Arr;

final class FormedOrderState extends OrderState
{
    protected $allowedStatuses = [
//        Status::PAID,
        Status::SENT,
        Status::COMPLETED,
        Status::CANCELLED,
    ];

    public function value(): string
    {
        return Status::FORMED;
    }

    public function actions(): void
    {
        (new ModificationProductService ($this->order))
            ->handler('checkoutInStock', $this->order->items);
    }

    public function humanValue(): string
    {
        return Arr::get(Status::list(), Status::FORMED);
    }
}
