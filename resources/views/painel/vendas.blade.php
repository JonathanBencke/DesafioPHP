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
                        <form id="form" name="form" action="{{url('painel/vendas')}}">
                            <div class="col-md-8">
                                <select class="selectpicker col-md-12" data-live-search="true">
                                    <option data-tokens="">Selecione</option>
                                    @foreach($produtos as $produto)
                                    <option data-tokens="{{$produto->nome}} {{$produto->produtoTipo->nome}}">{{$produto->nome}} - {{$produto->produtoTipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" min="0" name="quantidade" placeholder="QTD" required type="number">
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor(un)</th>
                                    <th>Custo</th>
                                    <th>Custo Sem Imposto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tomate</td>
                                    <td>13</td>
                                    <td>R$ 3,50</td>
                                    <td>R$ 15,50</td>
                                    <td>R$ 11,20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--<div class="ui-widget" style="margin-top:2em; font-family:Arial">
                Debug:
                <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
            </div>-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    
    
</script>
@endsection
