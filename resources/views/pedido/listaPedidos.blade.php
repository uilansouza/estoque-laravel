@extends('layout.app')

@section('content')

    <h1>Listagem dos Pedidos</h1>
    @if(empty($pedidos))
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
            <th>Nº Pedido</th>
            <th>Cliente</th>
            <th>Total Itens</th>
            <th>Total Pedidos</th>
            <th>Data Pedido</th>
            <th>Detalhes</th>
            <th>Excluir</th>
        </tr>
        @foreach ($pedidos as $p)
         <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->nome}}</td>
                <td class="text-center">{{$p->soma}}</td>  
                <td >R$: {{number_format($p->total, 2, ',', '.')}}</td>
                <?php $data = strtotime($p->data_pedido); ?>
                <td class="text-center">{{date('d/m/Y H:m:s',$data)}}</td>
                <td class="text-center">
                        <a href="{{action('ItensController@lista', $p->id)}} "><span class="glyphicon glyphicon-search"></span></a>
                </td>
                <td class="text-center">
                 <a href="{{action('ItensController@remove', $p->id)}}">
                     <span class="glyphicon glyphicon-trash"></span>
                </a>
                </td>
          </tr>
               
            
           
            
        @endforeach
    @endif
    </table>
   rddr
   

@stop
