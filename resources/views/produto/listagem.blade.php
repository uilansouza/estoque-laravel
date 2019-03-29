

@extends('layout.app')

@section('content')

    <h1>Listagem de produtos</h1>
    @if(empty($produtos))
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

      @if(old('nome'))
        <div  class="text-center alert alert-success clear">
            <strong>Sucesso!! </strong>O produto <strong> {{ old('nome') }} </strong>foi adicinado com sucesso!!
        </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Item</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Detalhes</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
         @foreach ($produtos as $p)
            <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}">
                <td>{{$p->nome}}</td>
                <td>{{$p->valor}}</td>
                <td >{{$p->descricao}}</td>
                <td class="text-center">{{$p->quantidade}}</td>
                <td title="Visualiza os detalhes do Produto" class="text-center">
                        <a href="/produtos/mostra/<?=$p->id?>"><span class="glyphicon glyphicon-search"></span></a>
                </td>
                <td title="Editar Produto" class="text-center" >
                 <a href="{{action('ProdutoController@edita', $p->id)}}">
                     <span class="glyphicon glyphicon-pencil"></span>
                </a>
                </td>
                <td title="Excluir" Produto class="text-center">
                 <a href="{{action('ProdutoController@remove', $p->id)}}">
                     <span class="glyphicon glyphicon-trash"></span>
                </a>
                </td>
               
            </tr>
            @if($p->quantidade<=1)
                <?php $quant=true;?>
            @endif
            
        @endforeach
    @endif
    </table>
    @if($quant)
        <h4>
            <span class="label label-danger pull-right">Um ou menos itens no estoque</span>
        </h4>
    @endif
   
  

   
       

@stop
