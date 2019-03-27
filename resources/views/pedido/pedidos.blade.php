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
       
                             
                <h1>Novo Pedido</h1> 
               
                <form action ="/pedidos/adiciona" method="post">
                <input type ="hidden" name="_token" value="{{{csrf_token()}}}">
                <div class="form-group">
                
                     <label for="sel1">Escolha o Cliente</label>
                     <select name="cliente_id" class="form-control" id="sel1">
                         <option   value ='' default>Escolha o Cliente</option>
                         @foreach ($clientes as $c)
                            <option  value="{{$c->id}}"> {{$c->nome}} </option>
                         @endforeach  
                      </select>
                </div>
                
               
                <input type ="hidden" name="user_id" value="{{Auth::id()}}">
                <button type="submit" class="btn btn-info btn-block">Adicionar</button>
                </form>
            </div>
    </div>
</div>

@stop