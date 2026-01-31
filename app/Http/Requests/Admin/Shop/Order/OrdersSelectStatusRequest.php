<?php

namespace App\Http\Requests\Admin\Shop\Order;

use App\Status\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrdersSelectStatusRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status_id' => [
                'required',
                'integer',
                Rule::in(array_keys(Status::list())),
            ]
        ];
    }

    public function messages()
    {
        return [
            'status_id.required' => 'Неверные входные параметры 1',
            'status_id.integer' => 'Неверные входные параметры 2',
            'status_id.in' => 'Неверные входные параметры 3',
        ];
    }
}
