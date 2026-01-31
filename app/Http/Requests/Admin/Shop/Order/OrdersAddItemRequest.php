<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class OrdersAddItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'modification_id' =>  'required|exists:vinograd_product_modifications,id',
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

//    public function messages()
//    {
//        return [
//            'track_code.regex' => 'Код должен иметь формат: для почты - "VV380205975BY, для Boxberry - BBU17340054869422"'
//        ];
//    }
}
