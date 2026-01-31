<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class OrdersItemUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'item_id' =>  'required|exists:vinograd_order_items,id',
            'quantity' => ['required', 'integer']
        ];
    }

//    public function messages()
//    {
//        return [
//            'track_code.regex' => 'Код должен иметь формат: для почты - "VV380205975BY, для Boxberry - BBU17340054869422"'
//        ];
//    }
}
