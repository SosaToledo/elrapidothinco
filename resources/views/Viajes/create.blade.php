@extends('layouts.app')
@section('title', 'Nuevo viaje')
  
@section('content')

<div class="row">

    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('viajes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar Nuevo Viaje</h2>
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
   
<style>
    #estado {
        font-family: 'FontAwesome', sans-serif;
    }
</style>

<form action="{{ route('viajes.store') }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-sm-12 col-md-2 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" readonly value="VJ{{$ultimo}}" max=10 name="idSimpleViajes" class="form-control" placeholder="">
            </div>
        </div>
      
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="hidden" id="camion" name="camion" >
                <input type="text" id="camionAutocomplete" maxlength="7" name="camionVista" class="form-control" placeholder="Ingresar la patente" required autofocus>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="hidden" id="acoplado" name="acoplado" >
                <input type="text" id="acopladoAutocomplete" class="form-control" name="acopladoVista" placeholder="Ingresar patente" >
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Chofer:</strong>
                <input type="hidden" id="camionero" name="camionero" >
                <input type="text" id="camioneroAutocomplete" class="form-control" name="camioneroVista" placeholder="Ingresar Apellido"  required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2 lg-3">
            <div class="form-group">
                <strong>Estado:</strong>
                <select class="form-control" name="estado" id="estado" value="Terminado">
                    <option value="Iniciado"> &#xf09c;  Iniciado </option>
                    <option value="Terminado"> &#xf023; Terminado </option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="fecha" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-7 lg-3">
            <div class="form-group">
                <strong>Cliente:</strong>
                <input type="hidden" id="cliente" name="cliente" >
                <input type="text" id="clienteAutocomplete" class="form-control" name="clienteVista" placeholder="Ingresar razon social"required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="text" id="" class="form-control" name="origen" placeholder="Ingrese nombre de la cuidad"required>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" id="" class="form-control" name="destino" placeholder="Ingrese nombres de las ciudades"required>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" id="km_inicial" >
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" id="km_final" >
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" id="distancia">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-1">
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input type="text" class="form-control" name="cantidad" id="cantidad" value="1">
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="text" class="form-control" name="precio" id="precio" >
            </div>
        </div>
        <!--fin TODO-->
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" id="valorViaje" placeholder="Cantidad x Precio" >
            </div>
        </div>
        <div class="col-sm-12 col-md-2">
            <div class="form-group">
                <strong>Comisión:</strong>
                <input type="text" class="form-control" name="comision" id="comision" placeholder="" value="0"  required>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" id="gananciaCamionero" placeholder="(Valor-Comision)*18%">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <select class="form-control" name="tipoCamion" id="tipo">
                    <option value="Chasis">Chasis</option>
                    <option value="Acoplado">Chasis y acoplado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" >
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" >
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Viaticos:</strong>
                <input type="text" class="form-control" name="peajes" >
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 lg-3">
            <div class="form-group">
                <strong>Remitos:</strong>
                <input type="text" class="form-control" name="remitos" id="remitos" placeholder="Ingrese valores separados por coma">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
   
</form>
<script src="{{ asset('js/autocomplete-calc.js')}}"></script>

<script>
    $(document).ready(function() {

    //Autocompletado para camiones
    $( "#camionAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('camiones.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.patente,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#camionAutocomplete').val(ui.item.label); // display the selected text
                $('#camion').val(ui.item.value); // save selected id to input
                return false;
            }
        },
        focus: function(event, ui){
            return false;
        }
    });

    //Autocompletado para acoplados
    $( "#acopladoAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('acoplado.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.patente,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#acopladoAutocomplete').val(ui.item.label); // display the selected text
                $('#acoplado').val(ui.item.value); // save selected id to input
                return false;
            }
        },
        focus: function(event, ui){
            return false;
        }
    });

    //camioneros autocomplete
    $( "#camioneroAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('camioneros.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.apellido + " " + obj.nombre,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#camioneroAutocomplete').val(ui.item.label); // display the selected text
                $('#camionero').val(ui.item.value); // save selected id to input
                return false;
            }
        },
        focus: function(event, ui){
            return false;
        }
    });

    //clientes autocomplete
    $( "#clienteAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('clientes.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.nombre,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#clienteAutocomplete').val(ui.item.label); // display the selected text
                $('#cliente').val(ui.item.value); // save selected id to input
                return false;
            }
        },
        focus: function(event, ui){
            return false;
        }
    });

    //ciudades autocomplete
    $( "#origenAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('ciudades.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            //console.log(obj);
                            return {
                                label: obj.nombre + " - " + obj.provincia,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#origenAutocomplete').val(ui.item.label); // display the selected text
                $('#origen').val(ui.item.value); // save selected id to input
                return false;
            }
            
        },
        focus: function(event, ui){
            return false;
        }
    });

    //ciudades autocomplete
    $( "#destinoAutocomplete" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('ciudades.search')}}",
                data: {
                        term : request.term
                },
                dataType: "json",
                success: function(data){

                    if(!data.length){
                        var result = [
                            { label: 'Sin resultados', value: response.term }
                        ];
                        response(result);
                    }
                    else{
                        var resp = $.map(data,function(obj){
                            return {
                                label: obj.id + " | " + obj.nombre + " - " + obj.provincia,
                                value: obj.id
                            }
                        });
                        response(resp);
                    }
                }
            });
        },
        minLength: 1,
        select:function(event,ui){
            if (ui.item.label == "Sin resultados") {
                event.preventDefault(); 
            } else {
                $('#destinoAutocomplete').val(""); 
                $('#destinoTag').tagsinput('add', ui.item.label,true,true );
                console.log($("#destinoTag").val());
                return false;
            }
            
        },
        focus: function(event, ui){
            return false;
        }
    });
    //Terminan los auto complete aca --------------


    });
</script>
@endsection