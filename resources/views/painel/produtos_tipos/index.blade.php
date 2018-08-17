@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tipos de Produtos</div>

                <div class="panel-body">
                    @if(count($produtos_tipos)>0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Imposto</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos_tipos as $produto_tipo)
                            <tr>
                                <td>{{$produto_tipo->id}}</td>
                                <td>{{$produto_tipo->nome}}</td>
                                <td>{{$produto_tipo->imposto}}%</td>
                                <td><a href="{{action('Painel\ProdutosTiposController@edit', $produto_tipo->id)}}" class="btn btn-warning">Edit</a></td>
                                <td> 
                                    <form action="{{action('Painel\ProdutosTiposController@destroy', $produto_tipo->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    Nenhum tipo de produto cadastrado!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
