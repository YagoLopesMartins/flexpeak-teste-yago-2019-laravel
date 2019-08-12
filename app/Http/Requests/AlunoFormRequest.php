<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoFormRequest extends FormRequest
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
            'NOME'=>'required|max:255',
            'DATA_NASCIMENTO'=>'required',
            'LOGRADOURO'=>'required|max:255',
            'NUMERO'=>'required|max:20',
            'BAIRRO'=>'required|max:255',
            'CIDADE'=>'required|max:255',
            'ESTADO'=>'required|max:255',
            'DATA_CRIACAO'=>'required',
            'CEP'=>'required|max:25',
            'ID_CURSO'=>'required'
        ];
    }
}
