@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Tipo de Produto</div>

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
                    <form method="post" action="{{url('painel/produtos-tipos')}}">
                        {{csrf_field()}}

                        <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label col-form-label-lg">Nome</label>

                            <input type="text" required class="form-control form-control-lg" placeholder="Nome do produto" name="nome">

                        </div>

                        <div class="form-group col-md-2">
                            <label for="lgFormGroupInput" class="col-form-label col-form-label-lg">Percentual de imposto</label>

                            <input type="number" required class="form-control form-control-lg" max="100" min="0" placeholder="imposto" name="imposto">

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
