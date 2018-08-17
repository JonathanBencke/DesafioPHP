<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produtos;
use App\ProdutosTipos;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller {

    //rota de redirecionamente apos termino de ação
    private $redirect_to = "painel/produtos";

    /**
     * 
     * @return view com listagem dos produtos
     */
    public function index() {

        $produtos = Produtos::all();

        return view('painel.produtos.index', array("produtos" => $produtos));
    }

    /**
     * 
     * @return view para cadastro de uma novo produto
     */
    public function create() {
        $produtos_tipos = ProdutosTipos::orderBy('nome')->get();

        return view('painel.produtos.create', array("produtos_tipos" => $produtos_tipos));
    }

    /**
     * Salva novo produto POST
     * @param Request $request
     * @return redirect para index
     */
    public function store(Request $request) {

        //validação do post
        $this->validate($request, [
            'nome' => 'required|max:100',
            'valor' => 'required|numeric|min:0'
        ]);

        //salva produto na base
        $produto = new Produtos([
            'nome' => $request->get('nome'),
            'produto_tipo_id' => $request->get('produto_tipo_id'),
            'valor' => $request->get('valor'),
            'user_id' => Auth::user()->id
        ]);

        $produto->save();

        return redirect($this->redirect_to);
    }

    /**
     * 
     * @param int $id
     * @return view para editar produto selecionado
     */
    public function edit($id) {
        $produto = Produtos::find($id);
        $produtos_tipos = ProdutosTipos::orderBy('nome')->get();

        return view('painel.produtos.edit', array('produto' => $produto, 'produtos_tipos' => $produtos_tipos));
    }

    /**
     * 
     * @param Request $request
     * @param int $id
     * @return redireciona para index
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'nome' => 'required|max:100',
            'valor' => 'required|numeric|min:0'
        ]);

        $produto = Produtos::find($id);
        $produto->nome = $request->get('nome');
        $produto->produto_tipo_id = $request->get('produto_tipo_id');
        $produto->valor = $request->get('valor');
        $produto->save();

        return redirect($this->redirect_to);
    }

    /**
     * Exclui produto selecionado
     * @param int $id
     * @return redireciona para index
     */
    public function destroy($id) {
        $produto = Produtos::find($id);
        $produto->delete();

        return redirect($this->redirect_to);
    }

}
