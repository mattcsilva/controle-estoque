<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'valor_total' => 'required|min:1',
            'id_cliente'  => 'required|min:1',
            'id_vendedor' => 'required|min:1'
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
