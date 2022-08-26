<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:254',
            'email' => 'required|email|max:255|unique:users,email',
            'registration' => 'required|string|max:255|unique:users,registration',
            'fidelity' => 'required',
            'permission' => 'required',
            'password' => 'required|string|min:3|max:18',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'registration' => 'matrícula',
            'fidelity' => 'fidelidade',
            'permission' => 'permissao',
            'password' => 'senha',
        ];

    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter pelo menos :min caracteres',
            'max' => 'O campo :attribute só pode ter no maximo :max caracteres',
            'unique' => ':Attribute já existe',
        ];
    }
}
