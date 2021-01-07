<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_dispatch' => 'bail|required|max:255|min:3',
            'city_destination' => 'bail|required|max:255|min:3',
            'price' => 'bail|required|numeric|between:1,1000000'
        ];
    }

    public function messages()
    {
        return [
            'city_dispatch.required' => 'Поле ":attribute" должно быть заполнено!',
            'city_destination.required' => 'Поле ":attribute" должно быть заполнено!',
            'price.required' => 'Поле ":attribute" должно быть заполнено!',
            'price.between' => 'Поле ":attribute" должно быть в диапозоне от 1 до 1000000!',
        ];
    }

    public function attributes()
    {
        return [
            'city_dispatch' => 'City dispatch',
            'city_destination' => 'City destination',
            'price' => 'Price',
        ];
    }
}
