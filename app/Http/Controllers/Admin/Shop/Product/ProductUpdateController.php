<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Admin\Shop\Product\ViewModels\AdminProductViewModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\ProductRequest;
use App\Jobs\ContentProcessing;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductUpdateController extends Controller
{
    public function show(Request $request, Product $product)
    {
        if($request->ajax()){
            return response()->json([
                'body' => view('admin.shop.product.partials._form', new AdminProductViewModel($product))->render(),
                'header' => $product->name . ' - редактировать'
            ]);
        }
       return view('admin.shop.product.update', new AdminProductViewModel($product));
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product->edit($request);

            $product->toggleStatus($request->boolean('status'));
            $product->toggleFeatured($request->get('is_featured'));

            $product->imageProcessing($request);
            ContentProcessing::dispatch($product);

            return ($request->ajax())
                ? ['success' => view('admin.shop.product.partials._tr', ['product' => $product])->render()]
                : redirect()->route('admin.product.index');

        } catch (\Exception $e) {
            return ($request->ajax()) ?  ['errors' => $e->getMessage()] : back()->withErrors([$e->getMessage()]);
        }
    }
}
