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
            'user_id' => 'bail|required',
            'track_code' => 'bail|required|max:255|min:3',
            'status' => 'bail|required',
            'city_dispatch' => 'bail|required',
            'city_destination' => 'bail|required',
            'price' => 'bail|required|numeric|between:1,1000000'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Поле ":attribute" должно быть заполнено!',
            'track_code.required' => 'Поле ":attribute" должно быть заполнено!',
            'track_code:min' => 'Минимальная длина поля ":attribute" - 3!',
            'track_code:max' => 'Максимальная длина поля ":attribute" - 255!',
            'track_code.unique' => 'Поле ":attribute" должно быть уникальным!',
            'status.required' => 'Поле ":attribute" должно быть заполнено!',
            'city_dispatch.required' => 'Поле ":attribute" должно быть заполнено!',
            'city_destination.required' => 'Поле ":attribute" должно быть заполнено!',
            'price.required' => 'Поле ":attribute" должно быть заполнено!',
            'price.numeric' => 'Поле ":attribute" должно быть числом!',
            'price.between:min' => 'Минимальное значение поля ":attribute" - 1!',
            'price.between:max' => 'Максимальное значение поля ":attribute" - 1000000!',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'User id',
            'track_code' => 'Track code',
            'status' => 'Status',
            'city_dispatch' => 'City dispatch',
            'city_destination' => 'City destination',
            'price' => 'Price',
        ];
    }
}
