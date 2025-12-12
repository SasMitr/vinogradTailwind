<?php

namespace App\Http\Controllers\Admin\Shop\Modification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Modification\ModificationRequest;
use App\Models\Shop\Modification;
use App\Models\Shop\ModificationProps;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class AddModificationForProductController extends Controller
{
    public function show(Request $request, $product_id)
    {
        $modifications = ModificationProps::query()->select('id', 'name')->get();
        if($request->ajax()) {
            return response()->json([
                'body' => view('admin.shop.modification.partials._form', [
                    'product_id' => $product_id,
                    'modifications' => $modifications
                ])->render(),
                'header' => 'Добавить модификацию к продукту'
            ]);
        }
        return view('admin.shop.modification.add-modification-for-product', [
            'product_id' => $product_id,
            'modifications' => $modifications
        ]);
    }

    public function create(ModificationRequest $request)
    {
        try {
            Modification::add($request->all());
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
