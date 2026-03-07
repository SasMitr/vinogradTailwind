<?php

namespace App\Http\Requests\Admin\Shop\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductSimilarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|integer|exists:vinograd_products,id',
            'similar'   => 'required|integer|exists:vinograd_products,id'
        ];
    }
}
