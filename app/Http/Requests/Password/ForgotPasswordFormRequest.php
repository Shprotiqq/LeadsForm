<?php

namespace App\Http\Requests\password;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordFormRequest extends FormRequest
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
            'email' => 'required|email|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле "e-mail" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту'
        ];
    }
}
