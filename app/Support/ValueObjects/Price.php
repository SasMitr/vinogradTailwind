<?php

namespace App\Support\ValueObjects;

use App\Services\CurrencyService;
use App\Support\Traits\Makeable;
use InvalidArgumentException;
use Stringable;

final class Price implements Stringable
{
    use Makeable;

    public function __construct( private readonly int $value, private readonly string $code = '')
    {
        if ($this->value < 0) {
            throw new InvalidArgumentException('Цена не может быть ниже нуля');
        }

        if (!$this->currencies()->contains('code', $this->code())) {
            throw new InvalidArgumentException('Такой тип валюты не поддерживается');
        }
    }

    public function raw(): int
    {
        return $this->value;
    }

    public function value(): float|int
    {
        return $this->value * $this->currency()->scale / $this->currency()->rate;
    }

    public function code()
    {
        return $this->code ?: CurrencyService::Currency()->code();
    }

    public function currency()
    {
        return $this->currencies()->where('code', $this->code())->first();
    }

    public function currencies()
    {
        return CurrencyService::Currency()->currencies();
    }

    public function currencyList()
    {
        return $this->currencies()->pluck('name', 'code')->all();
    }

    public function symbol(): string
    {
        return $this->currency()->sign;
    }

    public function __toString(): string
    {
        return  number_format($this->value(), 0, ',', ' ') . ' ' . $this->symbol();
    }
}
