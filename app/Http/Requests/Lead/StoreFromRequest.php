<?php

namespace App\Http\Requests\Lead;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFromRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'number' =>'required|int',
            'email' => 'required|email',
            'request' => 'required|text'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения',
            'last_name.required' => 'Поле "Фамилия" обязательно для заполнения',
            'number.required' => 'Поле "Номер телефона" обязательно для заполнения',
            'number.int' =>'Поле "Номер телефона"должно состоять из цифр',
            'email.required' => 'Поле "e-mail" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'request.required' => 'Поле "Текст заявки" обязательно для заполнения',
        ];
    }
}
