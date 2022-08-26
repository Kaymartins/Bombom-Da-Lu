<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'flavor' => 'required|min:3|max:254',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'flavor' => 'sabor',
            'price' => 'preço',
            'description' => 'descrição',
            'image' => 'imagem'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter pelo menos :min caracteres',
            'numeric' => 'O campo :attribute deve ser preenchido por numeros',
            'gt' => 'O campo :attribute deve ser maior que 0'
        ];
    }
}
