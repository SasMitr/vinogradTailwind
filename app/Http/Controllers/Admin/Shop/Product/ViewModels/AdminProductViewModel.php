<?php

namespace App\Http\Controllers\Admin\Shop\Product\ViewModels;

use App\Models\Shop\Category;
use App\Models\Shop\Country;
use App\Models\Shop\Product;
use App\Models\Shop\Selection;
use App\Models\Shop\Similar;
use Spatie\ViewModels\ViewModel;

class AdminProductViewModel extends ViewModel
{
    public function __construct(
        public ?Product $product = null
    ){}

    public function product(): Product|null
    {
        return $this->product ?? null;
    }

    public function similars(): array
    {
        if (!$this->product) return [];

        $similars = Similar::getIdsSimilarProduct($this->product->id);
        return $similars
            ? $similars->values->diff([$this->product->id])->all()
            : [];
    }

    public function products(): array
    {
        return Product::orderBy('name')->pluck('name', 'id')->all();
    }

    public function categorys(): array
    {
        return Category::orderBy('name')->pluck('name', 'id')->all();
    }

    public function countrys(): array
    {
        return Country::orderBy('name')->pluck('name', 'id')->all();
    }

    public function selections(): array
    {
        return Selection::orderBy('name')->pluck('name', 'id')->all();
    }
}
