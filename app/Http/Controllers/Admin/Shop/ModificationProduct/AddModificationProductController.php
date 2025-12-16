<?php

namespace App\Http\Controllers\Admin\Shop\ModificationProduct;

use App\Http\Controllers\Controller;
use App\Models\Shop\Modification;
use Illuminate\Http\Request;

class AddModificationProductController extends Controller
{
    public function __invoke(Request $request, $product_id)
    {
        $modifications = Modification::query()->select('id', 'name')->get();
        if($request->ajax()) {
            return response()->json([
                'body' => view('admin.shop.modification-product.partials._form', [
                    'product_id' => $product_id,
                    'modifications' => $modifications
                ])->render(),
                'header' => 'Добавить модификацию к продукту'
            ]);
        }
        return view('admin.shop.modification-product.addModificationProduct', [
            'product_id' => $product_id,
            'modifications' => $modifications
        ]);
    }
}
