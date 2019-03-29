<?php

namespace estoque\Http\Controllers;


use Request;
use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use estoque\Produto;
use estoque\ItensPedidos;
use estoque\Http\Requests\PedidoRequest;
use estoque\Http\Requests\ItensRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class ItensController extends Controller
{
    public function __construct()
    {
        //apenas quem esta logado pode executar esses métodos abaixo
        //$this->middleware('nosso-middleware',['only'=>['adiciona','remove','edita']]);
        
        $this->middleware('auth',['only' => ['novo','adiciona','lista']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo(Request $request)
    {
        $produtos = Produto::all();
        return view('itensPedidos\itensPedidos')->with('produtos',$produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adiciona(ItensRequest $request)
    {
       
        ItensPedidos::create($request->all());
        $produtos = Produto::all();
        
        return redirect('itens\novo')->with('status', 'Produto  Adicionado com Sucesso!!');
    }
    
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lista($id)
    {
        
        $itens = DB::table('itenspedidos')
        ->join('produtos',  'produtos.id', '=', 'itenspedidos.produto_id')
        ->join('pedidos', 'pedidos.id', '=', 'itenspedidos.pedido_id')
        ->join('clientes', 'clientes.id', '=', 'pedidos.cliente_id')
        ->select('pedidos.id','produtos.nome','produtos.descricao','itenspedidos.quantidade','itenspedidos.valor_venda',  DB::raw('itenspedidos.quantidade * itenspedidos.valor_venda as total'))
        ->where('pedidos.id',$id)
        ->get();
        
        return view('itensPedidos\listagem')->with('itens',$itens);


        /********     QUERY DE CONSULTA  **************************************
        select p.id as 'pedido', prod.nome,prod.descricao, i.quantidade, i.valor_venda as 'valor', (i.quantidade * i.valor_venda) as 'total'  from itenspedidos i 
            join produtos prod ON (prod.id = i.produto_id)
            JOIN pedidos p ON (p.id = i.pedido_id)
            join clientes c ON (c.id = p.cliente_id)
            where p.id = id;
        */
  }


  
}
