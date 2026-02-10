<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderSendMessageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'add_cart' => 'sometimes|accepted',
            'subject' =>  'required',
            'message' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Укажите тему письма',
            'message.required' => 'Набросайте хоть пару словей!'
        ];
    }
}
