<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductRemoveImgGallery extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:vinograd_products,id',
            'img' => 'required|string'
        ]);

        try {
            $product = Product::query()->find($request->product_id);
            $product->removeImageFromGallery([$request->img]);

            return ['success' => 'OK'];
        }
        catch (\Exception $e) {
            return ['errors' => $e->getMessage()];
        }
    }
}
