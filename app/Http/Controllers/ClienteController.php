<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests;
use Request;
use estoque\Http\Controllers\Controller;
use estoque\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\DB;
use estoque\Cliente;
use Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista()
    {
        $clientes = Cliente::all();
        return view('cliente\listarClientes')->with('clientes',$clientes);
    }

    public function novo()
    {
        return view('cliente\formulario');
    }

    public function adiciona(ClienteRequest $request){

        $email = DB::table('clientes')
        ->select('email')
        ->where('email', '=', $request->email)->value('email');

        if(!$email){
           Cliente::create($request->all());
           return redirect()->action('ClienteController@lista')->with('status', 'Cliente '. $request->nome .' Atualizado com Sucesso!!');
        }else{
            $this->validate($request, [
                'email' => 'required|unique:clientes',
                
            ]);

        }
       
    }

    public function edita($id){
        $campos =   Cliente::findOrFail($id);

        return view('cliente\editar')->with('campos',$campos);
    }

    public function atualizar(ClienteRequest $request ){
        $clientes = Cliente::findOrFail($request->id);

        $email = DB::table('clientes')
        ->select('email')
        ->where('email', '=', $request->email)->value('email');
                    
        if($email == $clientes->email){            
            $clientes ->nome = Request::input('nome');
            $clientes->email = Request::input('email');
            $clientes->endereco = Request::input('endereco');
            $clientes->telefone = Request::input('telefone');
            $clientes->save();
            return redirect()->action('ClienteController@lista')->with('status', 'Cliente '. $clientes->nome .' Atualizado com Sucesso!!');

        }else{
           
           
            $this->validate($request, [
                'email' => 'required|unique:clientes',
                
            ]);
        }
    }

    public function remove($id){
        $cliente = Cliente::find($id);
       $clientes =  $cliente->nome;
        $cliente->delete();
        $removido = $cliente ? 1:0;

        return redirect('clientes')->with('status', 'O Cliente: '.$clientes. ' foi Excluido com sucesso!');
    }

    
}