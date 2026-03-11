<?php

namespace App\Status;

use App\Services\ModificationProductService;
use Illuminate\Support\Arr;

final class PreliminaryOrderState extends OrderState
{
    protected $allowedStatuses = [
        Status::NEW
    ];

    function value(): string
    {
        return Status::PRELIMINARY;
    }

    function humanValue(): string
    {
        return Arr::get(Status::list(), Status::PRELIMINARY);
    }

    function actions(): void
    {
        (new ModificationProductService ($this->order))
            ->transitionToPre($this->order->items);

//        $MPS = new ModificationProductService ($this->order);
//        $MPS->handler('returnQuantity', $this->order->items);
//        $MPS->handler('returnInStock', $this->order->items);
    }

    protected function getAllowedStatuses(): array
    {
        return [
            Status::NEW => 'Новый'
        ];
    }
}
