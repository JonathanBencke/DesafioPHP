@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Vendas</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>Seleciona o produto abaixo</h3>
                    <div class="row">
                        <form method="post" action="{{url('painel/vendas')}}">
                            {{csrf_field()}}
                            <div class="col-md-8">
                                <select required class="selectpicker col-md-12" name="produto" data-live-search="true">
                                    <option value="" data-tokens="">Selecione</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{$produto->id}}" data-tokens="{{$produto->nome}} {{$produto->produtoTipo->nome}}">{{$produto->nome}} - {{$produto->produtoTipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" min="0" name="qtd" placeholder="QTD" required type="number">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success" name="salvar">Adicionar</button>
                            </div>
                        </form>
                    </div>
                    <!--<div class="ui-widget">
                   <input id="search" placeholder="Pesquise o produto" class="col-md-12 form-control">
               </div>-->
                    <div style="margin-top: 100px">
                        <h3>Listagem de produtos selecionados</h3>
                        @if(count($vendas)>0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor(un)</th>
                                    <th>Valor</th>
                                    <th>Valor Sem Imposto</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendas as $venda)
                                <tr>
                                    <td>{{$venda->produto->nome}} - {{$venda->produto->produtoTipo->nome}}</td>
                                    <td>{{$venda->qtd}}un</td>
                                    <td>R$ {{$venda->produto->valor}}</td>
                                    <td class="text-danger">R$ {{$venda->valor}}</td>
                                    <td class="text-success">R$ {{$venda->valor_liquido}}</td>
                                    <td> 
                                    <form action="{{action('Painel\VendasController@destroy', $venda->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Remover</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr style="margin-top: 100px">
                        <div class="text-right">
                            <h4 class="text-danger">Total R$ {{$total}}</h4>
                            <h3 class="text-success">Total sem imposto R$ {{$total_liquido}}</h3>
                        </div>
                        
                        @else
                        Nenhum produto adicionado
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

