<?php

namespace App\Models\DTO;

use App\Support\Traits\Makeable;
use Illuminate\Http\Request;

class ProductProps
{
    use Makeable;

    public function __construct(
        public readonly string|null $mass,
        public readonly string|null $color,
        public readonly string|null $flavor,
        public readonly string|null $frost,
        public readonly string|null $flower,
        public readonly array $similar = [],
    ) {}

    public static function fromRequest(Request $request): ProductProps
    {
        return static::make(...$request->input('props'));
    }
}
