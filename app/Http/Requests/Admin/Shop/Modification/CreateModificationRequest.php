<?php

namespace App\Http\Requests\Admin\Shop\Modification;

use Illuminate\Foundation\Http\FormRequest;

class CreateModificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:vinograd_modifications,name'],
            'weight' => ['required', 'integer', 'regex:/^[0-9]\d*$/']
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Такая модификация уже есть у этого товара!',
//            'weight.required' => 'Ошибка! Прегрузите станицу и попробуйте снова.'
//        ];
//    }

    public function  attributes()
    {
        return [
            'name' => '<b>[Название]</b>',
            'weight' => '<b>[Вес]</b>'
        ];
    }
}
