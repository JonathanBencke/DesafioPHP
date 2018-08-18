<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProdutosTipos;
use Illuminate\Support\Facades\Auth;

class ProdutosTiposController extends Controller {

    //rota de redirecionamente apos termino de ação
    private $redirect_to = "painel/produtos-tipos";

    /**
     * 
     * @return view com listagem dos produtos tipos
     */
    public function index() {
        
        
        $produtos_tipos = ProdutosTipos::where('user_id', Auth::user()->id)->get();

        return view('painel.produtos_tipos.index', array("produtos_tipos" => $produtos_tipos));
    }

    /**
     * 
     * @return view para cadastro de uma novo produto
     */
    public function create() {
        return view('painel.produtos_tipos.create');
    }

    /**
     * Salva novo tipo POST
     * @param Request $request
     * @return redirect para index
     */
    public function store(Request $request) {
        
        //validação do post
        $this->validate($request, [
            'nome' => 'required|max:100',
            'imposto' => 'required|numeric|min:0'
        ]);

            
        //salva tiipo de produto na base
        $produto_tipo = new ProdutosTipos([
            'nome' => $request->get('nome'),
            'imposto' => $request->get('imposto'),
            'user_id' => Auth::user()->id
        ]);
        
        $produto_tipo->save();

        return redirect($this->redirect_to);
    }

    /**
     * 
     * @param int $id
     * @return view para editar produto tipo selecionado
     */
    public function edit($id) {
        $produto_tipo = ProdutosTipos::find($id);

        return view('painel.produtos_tipos.edit', array('produto_tipo' => $produto_tipo));
    }

    /**
     * 
     * @param Request $request
     * @param int $id
     * @return redireciona para index
     */
    public function update(Request $request, $id) {

        //validação do post
        $this->validate($request, [
            'nome' => 'required|max:100',
            'imposto' => 'required|numeric|min:0|max:100'
        ]);

        $produto_tipo = ProdutosTipos::find($id);
        $produto_tipo->nome = $request->get('nome');
        $produto_tipo->imposto = $request->get('imposto');
        $produto_tipo->save();

        return redirect($this->redirect_to);
    }

    /**
     * Exclui tipo selecionado
     * @param int $id
     * @return redireciona para index
     */
    public function destroy($id) {
        $produto_tipo = ProdutosTipos::find($id);
        $produto_tipo->delete();

        return redirect($this->redirect_to);
    }

}
