<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Similar extends Model
{
    protected $table = 'vinograd_similars';
    public $timestamps = false;
    protected $fillable = ['values'];

    protected function values(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => collect(str($value)->explode(','))->filter(),

            set: fn (Collection $value) => str($value->unique()->implode( ','))->wrap(',')
        );
    }

    public static function getIdsSimilarProduct( $product_id ): self|null
    {
        return self::query()->where('values', 'like', '%,'. $product_id .',%')->first();
    }

    public static function isUsed($new_id, $ignore_id): bool
    {
        return self::query()
            ->where('values', 'like',  '%,' . $new_id . ',%')
            ->where('id', '<>', $ignore_id)
            ->exists();
    }

    public function add($request): void
    {
        if ($request->product_id != $request->similar) {
            self::query()->create([
                'values' => collect([$request->product_id, $request->similar])
            ]);
        }
    }

    public function combine($id): void
    {
        $this->values->push($id);
        $this->save();
    }
}
