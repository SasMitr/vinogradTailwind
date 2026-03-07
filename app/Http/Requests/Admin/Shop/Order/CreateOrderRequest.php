<?php

namespace App\Http\Requests\Admin\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CreateOrderRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'customer' => array_merge(
                $this->customer,
                [
                    'phone' => preg_replace("/[^\d]/", '', $this->input('customer.phone')),
                    'other_phone' => preg_replace("/[^\d]/", '', $this->input('customer.other_phone')),
                ]
            ),
        ]);
    }

    public function rules()
    {
        return [
            'customer.name' => 'required|min:3|max:50|string',
            'customer.phone' => 'nullable|required_without:customer.email|min:9|max:15',
            'customer.other_phone' => 'nullable|min:9|max:15',
            'customer.email' => 'nullable|required_without:customer.phone|email',
        ];
    }

    public function messages()
    {
        return [
            'customer.name.required' => 'Имя обязательно',
            'customer.email.required_without' => 'Либо Email либо номер телефона.',
            'customer.phone.required_without' => 'Либо Email либо номер телефона.',
            'customer.phone.min' => 'Не корректный номер телефона.',
            'customer.phone.max' => 'Не корректный номер телефона.',
            'customer.other_phone.min' => 'Не корректный номер телефона.',
            'customer.other_phone.max' => 'Не корректный номер телефона.',
        ];
    }
}
