<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class PedidoRequest extends Request
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
            'cliente_id'=>'required',
            

            //
        ];
    }
    public function messages()
    {
        return ['cliente_id.required'=>'O Campo Cliente  necessario'];

    }
}
