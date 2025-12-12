<?php

namespace App\Http\Controllers\Web\Shop\ViewModels;

use App\Models\Shop\Category;
use App\Models\Shop\Country;
use App\Models\Shop\Product;
use App\Models\Shop\Selection;
use Spatie\ViewModels\ViewModel;

class ProductViewModel extends ViewModel
{
    public function __construct(
        public Product $product
    ){}

    public function product(): Product|null
    {
        return $this->product->load('modifications.property:id,name');
    }

    public function contents(): array
    {
        return cache()->get($this->product->classNameByIDForCache());
    }
}
