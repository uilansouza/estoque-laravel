<?php 
$pedido = session()->get('pedido','nao passou');

?>
@extends('layout.app')
@section('content')
<div class="container center">
    <div class="row center">
    @if(count($errors)>0)    
        <div class=" col-md-8 alert alert-danger">
                <ul>                
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    
        <div class="row  col-md-12">
       
                <div class="nav  navbar-right">
                <font color ='blue'><strong>NºPedido: <?php echo  $pedido->id = isset($pedido->id) ?  $pedido->id:''; ?></strong> </font>
                </div>
                
                <h1>Novo Item</h1> 
               
                <form action ="/itens/adiciona" method="post">
                <input type ="hidden" name="_token" value="{{{csrf_token()}}}">
                <input type ="hidden" name="pedido_id" value="{{$pedido}}">
                <div class="form-group">
                
                     <label for="sel1">Escolha os Produtos</label>
                     <select name="cliente_id" class="form-control" id="sel1">
                         <option   value ='' default>Produtos</option>
                         @foreach ($produtos as $p)
                            <option  value="{{$p->id}}"> {{$p->nome}} </option>
                         @endforeach  
                      </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input name="quantidade" value="{{ old('quantidade') }}" id="quantidade" class="form-control">
                </div>
                <div class="form-group">
                    <label for="valor_venda">Valor</label>
                    <input name="valor_venda" value="{{ old('valor_venda') }}" id="valor" class="form-control">
                </div>
                
               
                <input type ="hidden" name="user_id" value="{{Auth::id()}}">
                <button type="submit" class="btn btn-info btn-block">Adicionar Item</button>
                </form>
            </div>
    </div>
</div>

@stop