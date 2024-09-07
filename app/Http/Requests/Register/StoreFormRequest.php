<?php

namespace App\Http\Requests\Register;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:35',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "имя" обязательно для заполнения',
            'email.required' => 'Поле "e-mail" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'email.unique' => 'Пользователь с такой почтой уже зарегестрирован',
            'password.required' => 'Поле "пароль" обязательно для заполнения',
            'password.confirmed' => 'Пароли должны совпадать',
            'password.min' => 'Пароль должен содержать минмимум 5 символов',
            'password.max' => 'Пароль должен содержать максимум 35 символов',
        ];
    }

}
