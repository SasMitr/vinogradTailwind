<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;

class ProductCommentsIndexController extends Controller
{
    public function __invoke(?string $status = null)
    {
        return view('admin.shop.product.comment.index');
    }
}
