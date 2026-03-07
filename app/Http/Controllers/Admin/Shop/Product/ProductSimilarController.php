<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\ProductSimilarRequest;
use App\Models\Shop\Similar;

class ProductSimilarController extends Controller
{
    public function add(ProductSimilarRequest $request): array
    {
        $similar = Similar::getIdsSimilarProduct($request->product_id);

        if ($similar) {
            if(Similar::isUsed($request->similar, $similar->id)) {
                return [ 'errors' => 'Этот сорт уже задействован в другом наборе' ];
            }
            $similar->combine($request->similar);

        } else {
            $similar = Similar::getIdsSimilarProduct($request->similar);

            $similar
                ? $similar->combine($request->product_id)
                : $similar->add($request);
        }
        return [ 'success' => 'OK' ];
    }

    public function remove (ProductSimilarRequest $request): array
    {
        $similar = Similar::getIdsSimilarProduct($request->product_id);
        $similar->values = $similar->values->diff([$request->similar]);

        $similar->values->count() > 1 ? $similar->save() : $similar->delete();

        return [ 'success' => 'OK' ];
    }
}
