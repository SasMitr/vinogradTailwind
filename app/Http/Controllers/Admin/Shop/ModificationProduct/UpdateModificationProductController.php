<?php

namespace App\Http\Controllers\Admin\Shop\ModificationProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\ModificationProduct\ModificationEditRequest;
use App\Models\Shop\ModificationProduct;
use App\Models\Shop\Product;

class UpdateModificationProductController extends Controller
{
    public function __invoke(ModificationEditRequest $request, $modification_id)
    {
        try {
            if(!$modification = ModificationProduct::query()->find($modification_id)) {
                throw new \Exception('Неверные входные параметры');
            }

            $product = Product::query()->find($modification->product_id);
            $modification->edit($request->price, $request->correct);

            return ($request->ajax())
                ? [
                    'success' => view('admin.shop.product._modification-input-item', ['product' => $product])->render(),
                    'id' => $product->id
                ]
                : redirect()->back();
        } catch (\Exception $e) {
            return ($request->ajax())
                ? ['errors' => $e->getMessage()]
                : back()->withErrors([$e->getMessage()]);
        }
    }
}
