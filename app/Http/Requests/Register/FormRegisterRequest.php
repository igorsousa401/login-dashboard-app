<?php

namespace App\Http\Requests\Register;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FormRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            "email.required" => "O Email é obrigatório.",
            "email.email" => "Insira um Email válido.",
            "email.unique" => "O Email inserido já está cadastrado.",
            "password.required" => "A Senha é obrigatória.",
            "password_confirm.required" => "A senha e a confirmação de senha não são iguais.",
            "name.required" => "O nome é obrigatório",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email|unique:users,email",
            "password" => "required|string",
            "password_confirm" => "required|string|same:password",
            "name" => "required"
        ];
    }
}
