<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class OrdersDateBuildRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date_build' => [
                'nullable',
                'string',
                // фотмат D/M/YYYY или DD/MM/YYYY
                'regex:/^(([1-9]|[0][1-9]|[12][0-9]|3[01])[-\/\.]([1-9]|[0][1-9]|1[012])[-\/\.](19|20)\d\d)|((1[012]|0[1-9])(3[01]|2\d|1\d|0[1-9])(19|20)\d\d)|((1[012]|0[1-9])[-\/\.](3[01]|2\d|1\d|0[1-9])[-\/\.](19|20)\d\d)$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'date_build.string' => 'Формат даты неверный',
            'date_build.regex' => 'Формат даты должен быть: < D/M/YYYY или DD/MM/YYYY >',
        ];
    }
}
