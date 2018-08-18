<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produtos;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class VendasController extends Controller {

    public function index() {
        
        //produtos para a listagem de vendas
        $produtos = Produtos::where('user_id', Auth::user()->id)
                ->get();
        
        return view('painel.vendas', array('produtos' => $produtos));
    }

    public function store(Request $request) {
        
        
        
    }

    
    
    
}
