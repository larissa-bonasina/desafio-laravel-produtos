<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('produtos', 'sku')->ignore($this->produto)
            ],
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'ativo' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'sku.required' => 'O SKU é obrigatório.',
            'sku.unique' => 'Este SKU já está em uso.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.min' => 'O preço deve ser maior que zero.',
            'quantidade_estoque.required' => 'A quantidade é obrigatória.',
            'quantidade_estoque.min' => 'A quantidade não pode ser negativa.',
            'categoria_id.required' => 'É necessário escolher uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',
            'ativo.required' => 'O status ativo é obrigatório.',
        ];
    }
}
