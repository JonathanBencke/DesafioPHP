<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
Rotas do painel
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function ($router) {
	
	/*
	Rota de vendas
	*/
	$router->group(['prefix' => 'vendas'], function ($router) {
		$router->get('/', 'Painel\VendasController@index')->name('vendas');
	});
	
	/*
	Rotas do crud produtos
	*/
	$router->resource('produtos', 'Painel\ProdutosController');
	
	/*
	Rotas do crud tipos de produtos
	*/
	$router->resource('produtos-tipos', 'Painel\ProdutosTiposController');

});