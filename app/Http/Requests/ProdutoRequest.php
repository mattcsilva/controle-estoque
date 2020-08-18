<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'descricao'      => 'required|min:3',
            'unidade_medida'  => 'required|min:1',
            'custo'  => 'required|min:1',
            'preco'  => 'required|min:1',
            'estoque'  => 'required|min:1',
            'id_fornecedor'  => 'required|min:1'
        ];
    }

    /**
     * Retornar mensagens em português
     */
    public function messages() {
        return [
            'required'  => 'A propriedade é obrigatória!',
            'min'       => 'Informe um valor válido!'
        ];
    }
}
