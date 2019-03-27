<?php

namespace estoque\Http\Controllers;


use Request;
use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use estoque\Produto;
use estoque\ItensPedidos;
use estoque\Http\Requests\PedidoRequest;
use estoque\Http\Requests\ItensRequest;
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
    public function lista()
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
