@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos</div>

                <div class="panel-body">
                    @if(count($produtos)>0)


                    <table id="datatable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo do Produto</th>
                                <th>Valor</th>
                                <th>Imposto</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->produtoTipo->nome}}</td>
                                <td>R$ {{$produto->valor}}</td>
                                <td>{{$produto->produtoTipo->imposto}}%</td>
                                <td><a href="{{action('Painel\ProdutosController@edit', $produto->id)}}" class="btn btn-warning">Edit</a></td>
                                <td> 
                                    <form action="{{action('Painel\ProdutosController@destroy', $produto->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Remover</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo do Produto</th>
                                <th>Valor</th>
                                <th>Imposto</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </tfoot>
                    </table>


                    @else
                    Nenhum produto cadastrado!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
