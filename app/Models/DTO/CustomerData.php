<?php

namespace App\Models\DTO;

use App\Support\Traits\Makeable;
use Illuminate\Http\Request;

class CustomerData
{
    use Makeable;

    public function __construct(
        public readonly string|null $phone,
        public readonly string $name,
        public readonly string|null $email,
        public readonly string|null $other_phone
    ) {}

    public static function fromRequest(Request $request): CustomerData
    {
        return static::make(...$request->input('customer'));
    }
}
