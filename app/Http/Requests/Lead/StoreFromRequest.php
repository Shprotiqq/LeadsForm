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
        return true;
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
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'request' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Имя" обязательно для заполнения',
            'last_name.required' => 'Поле "Фамилия" обязательно для заполнения',
            'email.required' => 'Поле "e-mail" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'phone_number.required' => 'Поле "Номер телефона" обязательно для заполнения',
            'phone_number.numeric' =>'Поле "Номер телефона"должно состоять из цифр',
            'request.required' => 'Поле "Текст заявки" обязательно для заполнения',
        ];
    }
}
