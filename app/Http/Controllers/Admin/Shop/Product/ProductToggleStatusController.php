<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductToggleStatusController extends Controller
{
    public function __invoke(Request $request, $product_id)
    {
        try {
            if(!$product = Product::query()->find($product_id)) {
                throw new \Exception('Неверные входные параметры');
            };
            $product->toggledsStatus();

            return ['success' => [
                    'id' => $product_id
                ]
            ];
        }
        catch (\Exception $e) {
            return ['errors' => $e->getMessage()];
        }
    }
}
