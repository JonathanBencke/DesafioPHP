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
    return view('welcome'); //retorna view inicial
});

//rotas de autenticação
Auth::routes();

/*
Rotas do painel com middleware de controle de autenticação
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function ($router) {
	
	/*
	Rota de vendas
	*/
	$router->group(['prefix' => 'vendas'], function ($router) {
		$router->get('/', 'Painel\VendasController@index')->name('vendas');
		$router->post('/', 'Painel\VendasController@store');
                $router->delete('/{id}', 'Painel\VendasController@destroy');
	});
	
	/*
	Rotas do crud produtos
	*/
	$router->group(['prefix' => 'produtos'], function ($router) {
		$router->get('/', 'Painel\ProdutosController@index');
		$router->get('/create', 'Painel\ProdutosController@create');
		$router->post('/', 'Painel\ProdutosController@store');
		$router->get('/{id}', 'Painel\ProdutosController@show');
		$router->get('/{id}/edit', 'Painel\ProdutosController@edit');
		$router->patch('/{id}', 'Painel\ProdutosController@update');
		$router->delete('/{id}', 'Painel\ProdutosController@destroy');
		/*
		OU SUBSTITUIR ROTAS ACIMA POR
		$router->resource('produtos', 'Painel\ProdutosController');
		*/
	});
	
	
	
	/*
	Rotas do crud tipos de produtos
	*/
	$router->group(['prefix' => 'produtos-tipos'], function ($router) {
		$router->get('/', 'Painel\ProdutosTiposController@index');
		$router->get('/create', 'Painel\ProdutosTiposController@create');
		$router->post('/', 'Painel\ProdutosTiposController@store');
		$router->get('/{id}', 'Painel\ProdutosTiposController@show');
		$router->get('/{id}/edit', 'Painel\ProdutosTiposController@edit');
		$router->patch('/{id}', 'Painel\ProdutosTiposController@update');
		$router->delete('/{id}', 'Painel\ProdutosTiposController@destroy');
		/*
		OU SUBSTITUIR ROTAS ACIMA POR
		$router->resource('produtos-tipos', 'Painel\ProdutosTiposController');
		*/
	});
	

});