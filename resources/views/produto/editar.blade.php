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
                <h1>Editar produto</h1> 
                <form action ="/produtos/atualizar/{{$campos->id}}" method="post">
                <input type ="hidden" name="_token" value="{{{csrf_token()}}}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name ="nome" id ="nome" value="{{ $campos->nome }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descricao">Descricao</label>
                    <input name="descricao" id="descricao" value="{{ $campos->descricao }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input name="valor" id="valor" value="{{ $campos->valor }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number"  name="quantidade" value="{{ $campos->quantidade }}" id="quantidade" min="0" class="form-control">
                </div>

                <button type="submit" class="btn btn-info btn-block">Atualizar</button>
                </form>
            </div>
    </div>
</div>

@stop