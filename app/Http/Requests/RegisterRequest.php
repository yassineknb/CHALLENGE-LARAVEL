<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages(): array
    {

        return [
            'name.required' => 'le nom est darouuri',
            'name.min' => 'le nom doit contenir au moins 3 caracteres',
            'email.required' => 'l-email est darouuri',
            'email.email' => 'kteb email s7i7 !!',
            'name.unique' => 'email deja utilisé',
            'password.required' => 'password darouuri',
            'password.min' => 'le password ne doit pas contenir au moins 6 caracteres',
            'password.confirmed' => 'la confirmation de password ne correspond pas',

        ];
    }
}
