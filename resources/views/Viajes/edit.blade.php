@extends('layouts.app')
@section('title','Editar viaje '.$viaje[0]->idSimpleViaje)

@section('content')
<div class="row">

    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('viajes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editando Viaje {{$viaje[0]->idSimpleViaje}}</h2>
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

<form action="{{ route('viajes.update', $viaje[0]->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-sm-12 col-md-2 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text"  max=10 name="idSimpleViajes" class="form-control" placeholder="" value="{{$viaje[0]->idSimpleViaje}}" readonly>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="hidden" id="camion" name="camion" value="{{$viaje[0]->id_camiones}}">
                <input type="text" id="camionAutocomplete" maxlength="7" value="{{$viaje[0]->id_simple_camiones}}" name="camionVista" class="form-control" placeholder="Ingresar la patente" required>
         
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="hidden" id="acoplado" name="acoplado" value="{{$viaje[0]->id_acoplado}}">
                <input type="text" id="acopladoAutocomplete" value="{{$viaje[0]->id_simple_acoplado}}" class="form-control" name="acopladoVista" placeholder="Ingresar patente" >
          
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Chofer:</strong>
                <input type="hidden" id="camionero" name="camionero" value="{{$viaje[0]->id_camionero}}">
                <input type="text" id="camioneroAutocomplete" class="form-control" value="{{$viaje[0]->apellido.' '.$viaje[0]->nombre}}" name="camioneroVista" placeholder="Ingresar Apellido" required>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-sm-12 col-md-2 lg-3">
            <div class="form-group">
                <strong>Estado:</strong>
                <select class="form-control" name="estado" id="estado" value="">
                    <option value="Iniciado" {{ old('tipo',$viaje[0]->estados)=='Iniciado' ? 'selected' : ''  }}>&#xf09c; Iniciado</option>
                    <option value="Terminado" {{ old('tipo',$viaje[0]->estados)=='Terminado' ? 'selected' : ''  }}>&#xf023; Terminado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="fecha" value="{{$viaje[0]->fecha}}" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-7 lg-3">
            <div class="form-group">
                <strong>Cliente:</strong>
                <input type="hidden" id="cliente" name="cliente" value="{{$viaje[0]->id_cliente}}">
                <input type="text" id="clienteAutocomplete" value="{{$viaje[0]->clienteNombre}}" class="form-control" name="clienteVista" placeholder="Ingresar razon social" required>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="hidden" id="origen" name="origen"  value="{{$viaje[0]->origen}}">
                <input type="text" id="origenAutocomplete" class="form-control" value="{{$viaje[0]->origen}}" name="origenVista" placeholder="Ingrese nombre de la cuidad" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" class="form-control" name="destino" value="{{$viaje[0]->destino}}" required>
            </div>
        </div>
     </div>
     <hr>
     <div class="row">
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" id="km_inicial" value="{{$viaje[0]->km_inicial}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" id="km_final" value="{{$viaje[0]->km_final}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" id="distancia" value="{{$viaje[0]->distancia}}">
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-sm-12 col-md-1">
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input type="text" class="form-control" value="{{$viaje[0]->cantidad}}" name="cantidad" id="cantidad" >
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="text" class="form-control" value="{{$viaje[0]->precio}}" name="precio" id="precio" >
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" value="{{$viaje[0]->valor}}" id="valorViaje">
            </div>
        </div>
        <div class="col-sm-12 col-md-2">
            <div class="form-group">
                <strong>Comisión:</strong>
                <input type="text" class="form-control" name="comision" value="{{$viaje[0]->comision}}" id="comision">
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" id="gananciaCamionero" value="{{$viaje[0]->ganancia_camionero}}">
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <select class="form-control" name="tipoCamion" id="tipo">
                    <option value="Chasis" {{ old('tipo',$viaje[0]->tipoCamion)=='Chasis' ? 'selected' : ''  }}>Chasis</option>
                    <option value="Acoplado" {{ old('tipo',$viaje[0]->tipoCamion)=='Acoplado' ? 'selected' : ''  }}>Chasis y Acoplado</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" value="{{$viaje[0]->notaViaje}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" value="{{$viaje[0]->guia}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-3 lg-3">
            <div class="form-group">
                <strong>Viáticos:</strong>
                <input type="text" class="form-control" name="peajes" value="{{$viaje[0]->peajes}}">
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 lg-3">
            <div class="form-group">
                <strong>Remitos:</strong>
                <input type="text" class="form-control" value="{{$viaje[0]->remitos}}" name="remitos" id="remitos" >
            </div>
        </div>
       
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</form>

@if (count($comprobantes) > 0)
<hr>
<div class="card border-info m-3">
    <div class="card-header bg-info text-white">
            Comprobantes asociados a este viaje
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>COD</th>
                        <th>Camionero</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th></th>
                </tr>
                @foreach ($comprobantes as $item)
                <tr>
                        <td>{{$item->id_simple_comprobante}}</td>
                        <td>{{$item->apellido.', '.$item->nombre}}</td>
                        <td>{{$item->tipo}}</td>
                        <td>${{$item->monto}}</td>
                        <td><a href="{{ route('comprobantes.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Ver | Editar</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info m-3">
        <i>No hay comprobantes asociados a este viaje.</i>
    </div>
@endif

<script src="{{ asset('js/autocomplete-calc.js')}}"></script>
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