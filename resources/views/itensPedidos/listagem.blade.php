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
        <?php $total = 0; ?>
         @foreach ($itens as $i)
          <tr>
                  <td>{{$i->nome}}</td>
                  <td >{{$i->descricao}}</td>  
                  <td class="text-center">{{$i->quantidade}}</td>
                  <td >R$: {{number_format($i->valor_venda, 2, ',', '.')}}</td>
                  <td >R$: {{number_format($i->total, 2, ',', '.')}}</td>
                  <?php $total +=$i->total; ?>
          </tr>       
        @endforeach
        <tr>
        <td colspan="4"><font color ="blue"><strong>Total do Pedido</strong></font></td>
        
        <td ><font color ="green"><strong>R$: {{number_format($total, 2,',','.')}}</strong></font></td>
        </tr>

    @endif
    </table>
    <div class=" row">
         <div class="col-md-3 col-md-offset-5"><form action ='/pedidos'><button type="submit" class="btn btn-info btn-block">Voltar</button></form>
        </div>
   </div>
    
   

   

@stop
