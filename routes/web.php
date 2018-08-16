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

Route::get('/home', 'HomeController@index')->name('home');

/*
Rotas do painel
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function ($router) {
	
	/*
	Rotas de vendas
	*/
	Route::group(['middleware' => ['auth'], 'prefix' => 'vendas'], function ($router) {
		$router->get('/', 'HomeController@index')->name('vendas');
	});
	
	/*
	Rotas de cadastro de produtos
	*/
	Route::group(['middleware' => ['auth'], 'prefix' => 'cadastrar-produto'], function ($router) {
		$router->get('/', 'HomeController@index')->name('cadastrar-produto');
	});
	
	/*
	Rotas de cadastro de tipos de produtos
	*/
	Route::group(['middleware' => ['auth'], 'prefix' => 'cadastrar-tipo-produto'], function ($router) {
		$router->get('/', 'HomeController@index')->name('cadastrar-tipo-produto');
	});

});