<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'amount' => 'required|numeric|gt:0',
            'date' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'product_id' => 'produto',
            'amount' => 'quantidade',
            'date' => 'data'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute deve ser preenchido por numeros',
            'gt' => 'O campo :attribute deve ser maior que 0'
        ];
    }
}
