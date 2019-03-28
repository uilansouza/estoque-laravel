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
    
        //
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove()
    {
       
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


/*
        select p.id as 'pedido', prod.nome,prod.descricao, i.quantidade, i.valor_venda as 'valor', (i.quantidade * i.valor_venda) as 'total'  from itenspedidos i 
            join produtos prod ON (prod.id = i.produto_id)
            JOIN pedidos p ON (p.id = i.pedido_id)
            join clientes c ON (c.id = p.cliente_id)
            where p.id = 28;
        */
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
