<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Admin\Shop\Product\ViewModels\AdminProductViewModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\ProductRequest;
use App\Jobs\ContentProcessing;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductCreateController extends Controller
{
    public function show(Request $request)
    {
        if($request->ajax()) {
            return response()->json([
                'body' => view('admin.shop.product.partials._form', new AdminProductViewModel())->render(),
                'header' => 'Добавить сорт'
            ]);
        }
        return view('admin.shop.product.create', new AdminProductViewModel());
    }

    public function create(ProductRequest $request)
    {
        try {
            $product = Product::add($request);

            $product->toggleStatus($request->boolean('status'));
            $product->toggleFeatured($request->get('is_featured'));

            $product->imageProcessing($request);
            ContentProcessing::dispatch($product);

            return ($request->ajax())
                ? [
                    'success' => view('admin.shop.product.partials._tr', ['product' => $product])->render(),
                    'id' => $product->id
                ]
                : redirect()->route('admin.product.index');

        } catch (\Exception $e) {
            return ($request->ajax()) ? ['errors' => $e->getMessage()] : back()->withErrors([$e->getMessage()]);
        }
    }
}
