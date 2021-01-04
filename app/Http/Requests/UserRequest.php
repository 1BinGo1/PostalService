<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'bail|required|max:255|min:3',
            'last_name' => 'bail|required|max:255|min:3',
            'email' => 'bail|required|email|max:255|unique:users,email,' . auth()->user()->id,
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Поле ":attribute" должно быть заполнено!',
            'last_name.required' => 'Поле ":attribute" должно быть заполнено!',
            'email.required' => 'Поле ":attribute" должно быть заполнено!',
            'first_name:min' => 'Минимальная длина поля ":attribute" - 3!',
            'first_name:max' => 'Максимальная длина поля ":attribute" - 255!',
            'email:max' => 'Максимальная длина поля ":attribute" - 255!',
            'email.unique' => 'Поле ":attribute" должно быть уникальным!',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email'
        ];
    }
}
