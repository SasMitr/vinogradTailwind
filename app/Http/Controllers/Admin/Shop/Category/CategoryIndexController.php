<?php

namespace App\Http\Controllers\Admin\Shop\Category;

use App\Http\Controllers\Controller;

class CategoryIndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.shop.category.index');
    }
}
