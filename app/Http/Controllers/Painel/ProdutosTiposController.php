<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutosTiposController extends Controller {

    public function index() {
        return view('painel.produtos_tipos.index');
    }

}
