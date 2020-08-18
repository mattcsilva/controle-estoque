<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
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
            'nome'      => 'required|min:1',
            'cnpj_cpf'  => 'required|min:8',
            'telefone'  => 'required|min:8'
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
