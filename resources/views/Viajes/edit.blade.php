@extends('layouts.app')
@section('title')
    Editar viaje
@endsection
@section('content')
<div class="row">

    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('viajes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editar Viaje</h2>
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
   
<form action="{{ route('viajes.update', $viaje[0]->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" disabled value=VC0000 max=10 name="idSimpleViajes" class="form-control" placeholder=""value="{{$viaje[0]->idSimpleViajes}}">
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="hidden" id="camion" name="camion" value="{{$viaje[0]->id_camiones}}">
                <input type="text" id="camionAutocomplete" maxlength="7" value="{{$viaje[0]->id_simple_camiones}}" name="camionVista" class="form-control" placeholder="Ingresar la patente">
         
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="hidden" id="acoplado" name="acoplado" value="{{$viaje[0]->id_acoplado}}">
                <input type="text" id="acopladoAutocomplete" value="{{$viaje[0]->id_simple_acoplado}}" class="form-control" name="acopladoVista" placeholder="Ingresar patente" >
          
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camionero:</strong>
                <input type="hidden" id="camionero" name="camionero" value="{{$viaje[0]->id_camionero}}">
                <input type="text" id="camioneroAutocomplete" class="form-control" value="{{$viaje[0]->apellido.' '.$viaje[0]->nombre}}" name="camioneroVista" placeholder="Ingresar Apellido" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Cliente:</strong>
                <input type="hidden" id="cliente" name="cliente" value="{{$viaje[0]->id_cliente}}">
                <input type="text" id="clienteAutocomplete" value="{{$viaje[0]->clienteNombre}}" class="form-control" name="clienteVista" placeholder="Ingresar razon social">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" value="{{$viaje[0]->km_inicial}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" value="{{$viaje[0]->km_final}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" value="{{$viaje[0]->distancia}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="hidden" id="origen" name="origen"  value="{{$viaje[0]->origen}}">
                <input type="text" id="origenAutocomplete" class="form-control" value="{{$viaje[0]->origen}}" name="origenVista" placeholder="Ingrese nombre de la cuidad">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" class="form-control" name="destino" value="{{$viaje[0]->destino}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" value="{{$viaje[0]->valor}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" value="{{$viaje[0]->ganancia_camionero}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <select class="form-control" name="tipoCamion" id="tipo">
                    <option value="Chasis"@php
                                             if($viaje[0]->tipoCamion == 'Chasis') echo 'selected'
                                          @endphp>Chasis</option>
                    <option value="Acoplado"@php 
                                              if($viaje[0]->tipoCamion == 'Acoplado') echo 'selected'
                                            @endphp >Acoplado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>fecha:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="fecha" value="{{$viaje[0]->fecha}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Peajes:</strong>
                <input type="text" class="form-control" name="peajes" value="{{$viaje[0]->peajes}}">
            </div>
        </div>        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (litros):</strong>
                <input type="text" class="form-control" name="gasoil_litros" value="{{$viaje[0]->gasoil_litros}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (precio):</strong>
                <input type="text" class="form-control" name="gasoil_precio" value="{{$viaje[0]->gasoil_precio}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" value="{{$viaje[0]->notaViaje}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" value="{{$viaje[0]->guia}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Estado:</strong>
                <select class="form-control" name="estado" id="" value="">
                    <option value="Iniciado"@php
                                             if($viaje[0]->estados == 'Iniciado') echo 'selected'
                                            @endphp>Iniciado</option>
                    <option value="Terminado"@php
                                             if($viaje[0]->estados == 'Terminado') echo 'selected'
                                            @endphp>Terminado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Guardar</button>
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