<?php

namespace App\Status;

use App\Models\Shop\Order\Order;
use InvalidArgumentException;
use Illuminate\Support\Str;
use ReflectionClass;

class Status
{
    const NEW = 1;
    const PAID = 2;
    const SENT = 3;
    const COMPLETED = 4;
    const CANCELLED = 5;
    const CANCELLED_BY_CUSTOMER = 6;
    const PRELIMINARY = 7;
    const FORMED = 8;

    public function __construct
    (
        public $value,
        public $created_at
    ) {}

    public static function createStatus (int $status, Order $order): OrderState
    {
        $class = self::get_name_class($status);
        return new $class($order);
    }

    public static function list(): array
    {
        return [
            self::NEW => 'Новый',
            self::PAID => 'Оплачен',
            self::SENT => 'Отправлен',
            self::COMPLETED => 'Выполнен',
            self::CANCELLED => 'Отменен',
            self::CANCELLED_BY_CUSTOMER => 'Отменен клиентом',
            self::PRELIMINARY => 'Предварительный',
            self::FORMED => 'Сформирован'
        ];
    }

    public static function orderEditable()
    {
        return [
            self::NEW,
            self::PAID,
            self::PRELIMINARY,
            self::FORMED
        ];
    }

    public static function color(int $status): string
    {
        return match ($status) {
            self::NEW => 'green',
            self::PAID => 'cyan',
            self::SENT => 'slate',
            self::COMPLETED => 'indigo',
            self::CANCELLED => 'red',
            self::CANCELLED_BY_CUSTOMER => 'red',
            self::PRELIMINARY => 'orange',
            self::FORMED => 'stone',
            default => 'default',
        };
    }

    private static function get_name_class(int $status): string
    {
        $consts = (new ReflectionClass (self::class))->getConstants ();

        foreach ($consts as $name => $value) {
            if ($value === $status) {
                return 'App\\Status\\'.Str::title($name).'OrderState';
            }
        }
        throw new InvalidArgumentException('Такой статус не поддерживается.');
    }
}
