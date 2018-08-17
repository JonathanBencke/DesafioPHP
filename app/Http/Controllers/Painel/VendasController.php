<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendasController extends Controller {

    public function index() {
        return view('painel.vendas');
    }

}
