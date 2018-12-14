<?php
namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;

use Validator;
class ProdutoController extends Controller{

    public function __construct()
    {
        //apenas quem esta logado pode executar esses métodos abaixo
        //$this->middleware('nosso-middleware',['only'=>['adiciona','remove','edita']]);
        
        $this->middleware('auth',['only' => ['adiciona', 'remove','edita']]);

    }

    public function lista(){
      
        $produtos = Produto::all();
        return view('produto\listagem')->with('produtos',$produtos);
        
       // return view('produto.listagem',compact($produtos));

    }
    public function mostra($id){
       
        $produto = Produto::find($id);
        if(empty($produto)){
            return '<h1>Este Produto nao existe</h1>';
        }
        return view('produto\detalhes')->with('p',$produto);
    }
    
    public function novo(){
        return view('produto\formulario');
    }

    public function adiciona(ProdutosRequest $request){

           
        Produto::create($request->all());
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));

    }

    public function edita($id){
       $campos =   Produto::findOrFail($id);

      return view('produto\editar')->with('campos',$campos);
      
    }

    public function atualizar(ProdutosRequest $request ){
        $produtos = Produto::findOrFail($request->id);
        $produtos ->nome = Request::input('nome');
        $produtos->descricao = Request::input('descricao');
        $produtos->valor = Request::input('valor');
        $produtos->quantidade = Request::input('quantidade');
        $produtos->save();


        return redirect('produtos')->with('status', 'Produto '. $produtos->nome .' Atualizado com Sucesso!!');

    }
    
    public function remove($id){

        $produto = Produto::find($id);
        $produto->delete();
        $removido = $produto ? 1:0;
       /* var_dump($removido);
        die();*/
     
       
       // return  redirect('produto\listagem')->with('status', 'Profile updated!');
        return redirect('produtos')->with('status', 'Item Excluido com sucesso!');

    }
}
?>