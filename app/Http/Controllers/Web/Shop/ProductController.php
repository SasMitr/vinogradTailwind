<?php

namespace App\Http\Controllers\Web\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Shop\ViewModels\ProductViewModel;
use App\Models\Shop\Product;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('web.shop.product', new ProductViewModel($product));
    }

}
