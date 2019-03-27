<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use estoque\Produto;
use estoque\Http\Requests\PedidoRequest;
use estoque\Cliente;
use estoque\Pedido;
session_start();
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
       $produtos =  Produto::all();
       $clientes = Cliente::all();
       
        return view('pedido\pedidos')->with('clientes',$clientes);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adiciona(PedidoRequest $request)
    {
        
        Pedido::create($request->all());
        $pedido = Pedido::orderBy('created_at', 'desc')->first();
        
        session()->put('pedido',$pedido);
      

               
       
        return redirect()->action('ItensController@novo');
    }

    
}
