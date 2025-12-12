<?php

namespace App\Http\Controllers\Web\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Shop\ViewModels\CategoryViewModal;
use App\Http\Requests\Shop\SortPostsRequest;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use Illuminate\Support\Facades\Cookie;

class CategoryController extends Controller
{
    public function __invoke(SortPostsRequest $request, $page = null)
    {

//        if (!$per_page) {
            $per_page = Cookie::get('example_length') ?: 21;
//        }
//        $products = Product::query()->getCategoryProducts($request, false, $per_page, $page);

        return view('web.shop.category', new CategoryViewModal($request, $per_page, $page));
//        return view('web.shop.category', compact('products'));
    }

//    private function temp ($request, $page, $category)
//    {
//        return [
//            'products' => $this->productRep->getSortProductByModifications($request, $page, $category),
//            'category' => $category,
//            'param' => $this->productRep->getParams($request),
//            'grid_list' => $this->productRep->getGridList(),
//            'ripening' => Category::$sortRipeningProducts,
//            'sort' => Category::getSortArr(),
//            'page' => $page
//        ];
//    }

}
