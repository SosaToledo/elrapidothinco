@extends('layouts.app')
  
@section('content')
<div class="row">

    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('viajes.index') }}">Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo viaje</h2>
        </div>
    </div>
</div>
<hr>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Parece que tenemos un problema con los datos que ingresaste.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('viajes.store') }}" method="POST">
    @csrf


    <!-- For defining autocomplete -->
    <input type="text" id='camiones_search'>

    <!-- For displaying selected option value from autocomplete suggestion -->
    <input type="text" id='camionesid' readonly>

     <!-- Script -->
     <script type="text/javascript">
        
        $(document).ready(function() {
            $( "#camiones_search" ).autocomplete({
        
                source: function(request, response) {
                    $.ajax({
                    url: "{{route('camiones.search')}}",
                    data: {
                            term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                    var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.patente,
                                value: obj.id,
                                data:obj
                            }
                    });
                    response(resp);
                    //response(data);
                    }
                });
            },
            minLength: 1,
            select:function(event,ui){
                // Set selection
               $('#camiones_search').val(ui.item.label); // display the selected text
               $('#camionesid').val(ui.item.value); // save selected id to input
               return false;
            },
            focus: function(event, ui){
                return false;
            }
        });
        });
        

        /* 
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
    
          $( "#camiones_search" ).autocomplete({
            source: function( request, response ) {
              // Fetch data
              $.ajax({
                url:"{{route('camiones.search')}}",
                type: 'post',
                dataType: "json",
                data: {
                   _token: CSRF_TOKEN,
                   search: request.term
                },
                success: function( data ) {
                   response( data );
                },
                error: function (xhr, textStatus, errorThrown) {
					var errorMessage = "Ajax error: " + this.url + " : " + textStatus + " : " + errorThrown + " : " + xhr.statusText + " : " + xhr.status;

					if (xhr.status != "0" || errorThrown != "abort") {
						alert(errorMessage);
					}
				}
              });
            },
            select: function (event, ui) {
               // Set selection
               $('#camiones_search').val(ui.item.label); // display the selected text
               $('#camionesid').val(ui.item.value); // save selected id to input
               return false;
            }
          });
    
        }); */
        </script>
        
     <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" disabled value=VC0000 max=10 name="idSimpleViajes" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="text" maxlength="7" name="camion" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="text" class="form-control" name="acoplado" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>camionero:</strong>
                <input type="text" class="form-control" name="camionero" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>cliente:</strong>
                <input type="text" class="form-control" name="cliente" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="text" class="form-control" name="origen" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" class="form-control" name="destino" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <input type="text" class="form-control" name="tipoCamion" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>fecha:</strong>
                <input type="date" class="form-control" name="fecha" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Peajes:</strong>
                <input type="text" class="form-control" name="peajes" >
            </div>
        </div>        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (litros):</strong>
                <input type="text" class="form-control" name="gasoil_litros" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (precio):</strong>
                <input type="text" class="form-control" name="gasoil_precio" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" >
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
        </div>
    </div>
   
</form>
@endsection