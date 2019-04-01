<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;
use Cliente;

class ClienteRequest extends Request
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

    public function rules()
    {
        
        return [
            'nome'=>'required|max:100',
           //'email'=>'required|unique:clientes|min:10',
            'endereco'=>'required|min:10|max:100',
            'telefone'=>'required|numeric|min:10'

            //
        ];
    }
    public function messages(){
        return[
            'required'=>'O campo :attribute Não pode ser branco'
        ];
    }
}
