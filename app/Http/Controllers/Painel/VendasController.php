<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produtos;
use App\Vendas;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class VendasController extends Controller {

    //rota de redirecionamente apos termino de ação
    private $redirect_to = "painel/vendas";

    /**
     * 
     * @return view de vendas
     */
    public function index() {

        //total do custo da venda
        $total = 0;
        $total_liquido = 0;

        //produtos para a listagem de vendas
        $produtos = Produtos::where('user_id', Auth::user()->id)
                ->get();

        //vendas cadastradas
        $vendas = Vendas::where('user_id', Auth::user()->id)
                ->get();

        //calcula valor liquido do produto
        foreach ($vendas as $venda) {

            //calcula para saber o valor do produto sem imposto
            $cal_valor_perc = $venda->produto->valor - (($venda->produto->valor / 100) * $venda->produto->produtoTipo->imposto);

            //valor final valor x quantidade
            $valor_x_qtd = $venda->produto->valor * $venda->qtd;
            $valor_x_qtd_liquido = $cal_valor_perc * $venda->qtd;

            $venda->valor = number_format($valor_x_qtd, 2); //valor do produto
            $venda->valor_liquido = number_format($valor_x_qtd_liquido, 2); //valor liquido do produto
            $total += $valor_x_qtd; //soma dos produtos com imposto
            $total_liquido += $valor_x_qtd_liquido; //soma dos produtos sem imposto
        }

        $paramentros = array(
            "vendas" => $vendas,
            "total" => number_format($total, 2),
            "total_liquido" => number_format($total_liquido, 2),
            'produtos' => $produtos
        );


        return view('painel.vendas', $paramentros);
    }

    /**
     * 
     * @param Request $request
     * @return redireciona para tela de vendas
     */
    public function store(Request $request) {

        //validação do post
        $this->validate($request, [
            'qtd' => 'required|numeric|min:0'
        ]);

        //salva produto na base
        $venda = new Vendas([
            'produto_id' => $request->get('produto'),
            'qtd' => $request->get('qtd'),
            'user_id' => Auth::user()->id
        ]);

        $venda->save();

        return redirect($this->redirect_to);
    }

    /**
     * Exclui uma venda selecionado
     * @param int $id
     * @return redireciona para index
     */
    public function destroy($id) {
        $venda = Vendas::find($id);
        $venda->delete();

        return redirect($this->redirect_to);
    }

}
