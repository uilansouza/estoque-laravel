

@extends('layout.app')

@section('content')

    <h1>Listagem Clientes</h1>
    @if(empty($clientes))
    <div class="alert alert-danger">
    Nenhum Cliente cadastrado
    </div>
    @else
   
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
            <th>Nome</th>
            <th>Email</th>
            <th>Endereco</th>
            <th>Telefone</th>
            <th>Editar</th>
            <th>Excluir</th>
            
        </tr>
         @foreach ($clientes as $c)
                <td>{{$c->nome}}</td>
                <td>{{$c->email}}</td>
                <td >{{$c->endereco}}</td>
                <td >{{$c->telefone}}</td>
                
                <td class="text-center" >
                 <a href="{{action('ClienteController@edita', $c->id)}}">
                     <span class="glyphicon glyphicon-pencil"></span>
                </a>
                </td>
                <td class="text-center">
                 <a href="{{action('ClienteController@remove', $c->id)}}">
                     <span class="glyphicon glyphicon-trash"></span>
                </a>
                </td>
               
            </tr>
           
            
        @endforeach
    @endif
    </table>
    
   
       

@stop
