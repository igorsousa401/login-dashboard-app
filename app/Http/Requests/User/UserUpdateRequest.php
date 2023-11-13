<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            "email.email" => "Insira um Email válido.",
            "email.unique" => "O Email inserido já está cadastrado.",
            "name.string" => "O Nome precisa ser tipo String."
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
            "email" => "email",
            "name" => "string",
            "permissions" => ['array', Rule::in(["product", "category", "brand"])],
        ];
    }
}
