@extends('layout.app')
@section('content')


<div class="nav  navbar-right">
        <span class=" btn-primary badge"><strong>Pedido Nº:{{$itens[0]->id}}</strong></span>
      </div>
    <h1>Detalhe dos Itens</h1>
    @if(empty($itens))
    <div class="alert alert-danger">
    Voce nao tem nenhum produto cadastrado
    </div>
    @else
    <?php $quant=false;?>
    @if (session('status'))
    <div  class="text-center alert alert-success">
           <strong>{{ session('status') }} </strong>
     </div>
     @endif
     
     
    <table class="table table-striped table-bordered table-hover">
        <tr>
           
            <th>Produto</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Total</th>
            
        </tr>
         @foreach ($itens as $i)
        <tr>
                <td>{{$i->nome}}</td>
                <td >{{$i->descricao}}</td>  
                <td class="text-center">{{$i->quantidade}}</td>
                <td >R$: {{number_format($i->valor_venda, 2, ',', '.')}}</td>
                <td >R$: {{number_format($i->total, 2, ',', '.')}}</td>
                             
        </tr>
            
    
            
        @endforeach
    @endif
    </table>
    <div class=" row">
         <div class="col-md-3 col-md-offset-5"><a  href="{{action('PedidoController@lista')}} "><button type="submit" class="btn btn-info btn-block">Voltar</button></a>
        </div>
   </div>
    
   

   

@stop
