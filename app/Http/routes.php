<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
  
    return 'Primeira Logagica';
});*/

Route::get('/produtos','ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id','[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona','ProdutoController@adiciona');


Route::get('/produtos/remove/{id}','ProdutoController@remove');
Route::get('/produtos/edita/{id}','ProdutoController@edita');
Route::post('/produtos/atualizar/{id}','ProdutoController@atualizar');


/**
 * Rotas para Clientes
 */

Route::get('/clientes','ClienteController@lista');
Route::get('/clientes/novo','ClienteController@novo');
Route::post('/clientes/adiciona','ClienteController@adiciona');
Route::get('/clientes/edita/{id}','ClienteController@edita');
Route::post('/clientes/atualizar/{id}','ClienteController@atualizar');
Route::get('/clientes/remove/{id}','ClienteController@remove');


/**
 * Rotas para Pedidos
 */
Route::get('/pedidos/novo','PedidoController@novo');
Route::post('/pedidos/adiciona','PedidoController@adiciona');
Route::get('/pedidos','PedidoController@lista');

/**
 * Rotas para Itens
 */

Route::get('/itens/novo','ItensController@novo');
Route::get('/itens/lista/{id}','ItensController@lista');
Route::post('/itens/adiciona','ItensController@adiciona');
Route::get('/itens/remove','ItensController@remove');


        

# Authentication

Route::get('/login','LoginController@login');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    ]);
//Route::get('auth/login', 'Auth\AuthController@getLogin');
