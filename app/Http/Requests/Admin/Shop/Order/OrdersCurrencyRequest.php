<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class OrdersCurrencyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'currency' => ['required', 'exists:vinograd_currency,code'],
        ];
    }

    public function messages()
    {
        return [
            'currency.exists' => 'Не корректные входные параметры.'
        ];
    }

//    protected function getRedirectUrl()
//    {
//        $url = $this->redirector->getUrlGenerator();
//        if (Route::currentRouteName() == 'orders.sent.status.mail') {
//            return $url->route('orders.track_code_form', $this->order_id);
//        }
//        return $url->previous();
//    }
}
