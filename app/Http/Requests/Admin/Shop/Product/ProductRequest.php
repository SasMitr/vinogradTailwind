<?php

namespace App\Http\Requests\Admin\Shop\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' =>'nullable|string|max:255',
            'name' =>'required|string|max:255',
            'content'   =>  'required|string',
            'ripening'   =>  'required',
            'description'   =>  'nullable|string',
            'category_id'   =>  'required|integer|exists:vinograd_categorys,id',
            'selection_id'   =>  'required|integer|exists:vinograd_selections,id',
            'country_id'   =>  'required|integer|exists:vinograd_countrys,id',
            'meta.*' => 'nullable|string|max:255',
            'image' =>  'nullable|image|max:500|dimensions:max_width=900,max_height=900',
            'gallery.*' => 'nullable|image|max:500|dimensions:max_width=900,max_height=900',
            'slug' =>  [
                'nullable',
                'string',
                Rule::unique('vinograd_products')->ignore($this->product),
            ]
        ];
    }

    public function messages()
    {
        return [
            'category_id.*' => 'Нужно выбрать КАТЕГОРИЮ из списка!',
            'selection_id.*' => 'Нужно выбрать ИМЯ селекционера из списка!',
            'country_id.*' => 'Нужно выбрать СТРАНУ селекции из списка!',
            'gallery.*' => 'Фото должно быть не более 500kb и иметь максимальные размеры 900х900px'
        ];
    }

    public function attributes()
    {
        return [
            'slug' => 'Алиас',
            'name' => '<b>Название</b>',
            'ripening' => '<strong>Срок созревания</strong>'
        ];
    }
}
