<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\ModificationProduct;
use App\Models\Shop\Product;

class ProductIndexController extends Controller
{
    public function __invoke(?string $status = null)
    {
        return view('admin.shop.product.index', [
            'products' => Product::query()->adminProductIndex($status)
        ]);
    }
}
