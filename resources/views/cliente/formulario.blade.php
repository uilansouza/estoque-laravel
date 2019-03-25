@extends('layout.app')

@section('content')

@if (session('status'))
    <div  class="text-center alert alert-success">
           <strong>{{ session('status') }} </strong>
     </div>
@endif
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

                <h1>Novo Cliente</h1> 
                <form action ="/clientes/adiciona" method="post">
                <input type ="hidden" name="_token" value="{{{csrf_token()}}}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name ="nome" id ="nome" value="{{ old('nome') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input name="email" type ="email"value="{{ old('email') }}" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input name="endereco" id="endereco" value="{{ old('endereco') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" value="{{ old('telefone') }}" id="telefone"  class="form-control">
                </div>

                <button type="submit" class="btn btn-info btn-block">Cadastrar</button>
                </form>
            </div>
    </div>
</div>


    @stop