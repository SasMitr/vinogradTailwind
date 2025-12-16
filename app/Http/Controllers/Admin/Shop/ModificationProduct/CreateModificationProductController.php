<?php

namespace App\Http\Controllers\Admin\Shop\ModificationProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\ModificationProduct\ModificationRequest;
use App\Models\Shop\ModificationProduct;
use App\Models\Shop\Product;

class CreateModificationProductController extends Controller
{
    public function __invoke(ModificationRequest $request)
    {
        try {
            ModificationProduct::add($request->all());
            if(!$product = Product::query()->find($request->product_id)) {
                throw new \Exception('Неверные входные параметры');
            };

            return ($request->ajax())
                ? [
                    'success' => view('admin.shop.product._modification-input-item', ['product' => $product])->render(),
                    'id' => $product->id
                ]
                : redirect()->route('admin.product.index'); // возможно придется править маршрут

        } catch (\Exception $e) {
            return ($request->ajax())
                ? ['errors' => $e->getMessage()]
                : back()->withErrors([$e->getMessage()]);
        }
    }
}
