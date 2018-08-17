<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendasController extends Controller {

    public function index() {
        return view('painel.vendas');
    }

	public function getProdutoByNomeAjax(Request $request){

		
		$retorno = array();
		
		$item1 = array("label" => "teste1", "value" => "teste1", "id" => 1);
		$item2 = array("label" => "teste2", "value" => "teste1", "id" => 1);
		
		$retorno[] = $item1;
		$retorno[] = $item2;
		
		
		return  json_encode($retorno);
	}
}
