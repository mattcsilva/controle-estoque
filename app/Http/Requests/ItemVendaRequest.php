<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemVendaRequest extends FormRequest
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
            'custo' => 'required|min:1',
            'preco' => 'required|min:1',
            'quantidade' => 'required|min:1',
            'id_venda'  => 'required|min:1',
            'id_produto' => 'required|min:1'
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
