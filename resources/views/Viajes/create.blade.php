@extends('layouts.app')
@section('title', 'Nuevo viaje')
  
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
                <input type="hidden" id="camion" name="camion" >
                <input type="text" id="camionAutocomplete" maxlength="7" name="camionVista" class="form-control" placeholder="Ingresar la patente">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="hidden" id="acoplado" name="acoplado" >
                <input type="text" id="acopladoAutocomplete" class="form-control" name="acopladoVista" placeholder="Ingresar patente" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camionero:</strong>
                <input type="hidden" id="camionero" name="camionero" >
                <input type="text" id="camioneroAutocomplete" class="form-control" name="camioneroVista" placeholder="Ingresar Apellido" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Cliente:</strong>
                <input type="hidden" id="cliente" name="cliente" >
                <input type="text" id="clienteAutocomplete" class="form-control" name="clienteVista" placeholder="Ingresar razon social">
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
                <input type="hidden" id="origen" name="origen"  >
                <input type="text" id="origenAutocomplete" class="form-control" name="origenVista" placeholder="Ingrese nombre de la cuidad">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" id="destino" name="destino"> <!-- //Aca vamos a ir guardando los id de las ciudades separadas por coma -->
                <input type="text" id="destinoAutocomplete" class="form-control" name="destinoVista" placeholder="Ingrese nombre de la ciudad">
                <input type="text" data-role="tagsinput" id="destinoTag" class="form-control" name="destinoTag">

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
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="fecha" >
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

<script type="text/javascript">
        
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
                                    //console.log(obj);
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


            $('[data-role="remove"]').on('click', function() {
                alert("click sobre boton x");
                console.log($(this));
            });

        });
</script>
@endsection