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

                    <div class="ui-widget">
						Digite o nome do produto
					  <input id="search" placeholder="Pesquise o produto" class="col-md-12 form-control">
					</div>
					 
					
                </div>
            </div>
			
			<div class="ui-widget" style="margin-top:2em; font-family:Arial">
					  Debug:
					  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
					</div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#search" ).autocomplete({
      source: "{{URL::to('painel/vendas/get-produto-ajax')}}",
      minLength: 2,
      select: function( event, ui ) {
        log( JSON.stringify(ui) );
      }
    });
  } );
  </script>
@endsection
