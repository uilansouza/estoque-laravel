<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use estoque\Produto;
use estoque\Http\Requests\PedidoRequest;
use estoque\Cliente;
use estoque\Pedido;
use Illuminate\Support\Facades\DB;

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

    public function lista()
    {
        $pedidos = DB::table('clientes')
        ->join('pedidos',  'pedidos.cliente_id', '=', 'clientes.id')
        ->join('itenspedidos', 'itenspedidos.pedido_id', '=', 'pedidos.id')
        ->select('pedidos.id','clientes.nome',   DB::raw('SUM(itenspedidos.quantidade) as soma'),  DB::raw('SUM(itenspedidos.quantidade*itenspedidos.valor_venda) as total')  ,'pedidos.data_pedido')
        ->groupBy('pedidos.id')
        ->get();

        
      
        return view('pedido\listaPedidos')->with('pedidos',$pedidos);
/*

       $valor = " select ped.id as 'Nº Pedido', cli.nome , sum(i.quantidade) as 'Total Itens', sum(i.quantidade*i.valor_venda) as 'Total Pedido' , ped.data_pedido from clientes cli
                    inner join pedidos ped ON (cli.id = ped.cliente_id)
                    inner join itenspedidos i on (i.pedido_id = ped.id)
                    group by (ped.id);';
        return view('produto\listagem')->with('produtos',$produtos);
       */ 
    }

    
}
