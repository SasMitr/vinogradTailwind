<?php

namespace App\Http\Controllers;

use App\Models\Shop\Product;
use App\Models\Shop\Similar;

class SupportController extends Controller
{
    public function __invoke()
    {
//        foreach (Product::all() as $product) {
//            $similars = Similar::where('values', 'like', '%,' . $product->id . ',%')->first();
//
//            if ($similars && isset($product->props['similar'])) {
//                $a = $similars->values;
//                foreach ($product->props['similar'] as $item) {
//                    if (!Similar::where('values', 'like', '%,' . $item . ',%')->first()) {
//                        $a[] = $item;
//                    }
//
//                }
//                if (!$a == $similars->values) {
//                    Similar::create([
//                        'values' => $a,
//                    ]);
//                }
//            } else {
//                if (isset($product->props['similar'])) {
//                    $a = [$product->id];
//                    foreach ($product->props['similar'] as $item) {
//                        if (!Similar::where('values', 'like', '%,' . $item . ',%')->first()) {
//                            $a[] = $item;
//                        }
//
//                    }
//                    if (count($a) > 1) {
//                        Similar::create([
//                            'values' => $a,
//                        ]);
//                    }
//
//                }
//            }
//        }


        return 'OK';
    }
}
