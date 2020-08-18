<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nome' => 'required|min:1',
            'cnpj_cpf' => 'required|min:8',
            'telefone' => 'required|min:8'
        ];
    }

    /**
     * Traduz as mensagens dos erros de validações
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'É necessário preencher todos os campos',
            'min' => 'É necessário informar mais caracteres'
        ];
    }
}
