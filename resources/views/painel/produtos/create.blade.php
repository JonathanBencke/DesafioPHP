@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Produto</div>

                <div class="panel-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{url('painel/produtos')}}">
                        {{csrf_field()}}

                        <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label col-form-label-lg">Nome</label>

                            <input type="text" required class="form-control form-control-lg" placeholder="Nome do produto" name="nome">

                        </div>

                        <div class="form-group col-md-10">
                            <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Tipo do produto</label>

                            <select required class="form-control form-control-lg" name="produto_tipo_id">
                                <option value="">Selecione o tipo do produto</option>
                                @foreach($produtos_tipos as $produto_tipo)
                                <option value="{{$produto_tipo->id}}">{{$produto_tipo->nome}}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="form-group col-md-2">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Valor</label>

                            <input type="number" required class="form-control form-control-lg" placeholder="Valor do produto" name="valor">

                        </div>
                        <div class="form-group col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Salvar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
