<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class ItensRequest extends Request
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
            'produto_id'=>'required',
            'quantidade'=>'required',
            'valor_venda'=>'required|numeric',
            'quantidade'=>'required|numeric'

            //
        ];
    }

    public function messages(){

        return[
            'produto_id.required'=>'É necessario informar um produto'
        ];
    }
}
