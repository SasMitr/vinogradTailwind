<?php

namespace App\Models\DTO;


use App\Support\Traits\Makeable;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Meta
{
    use Makeable;

    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $keywords
    ) {}

    public static function fromRequest(Request $request, $default = 'name'): Meta
    {
        $default = $request->input($default);

        $meta = Arr::map($request->input('meta'), function (string|null $value) use($default) {
            return $value ?: $default;
        });

        return static::make(...$meta);
    }
}
