 @extends('layouts.app')
@section('title', 'Nuevo comprobante')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('comprobantes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar Nuevo Comprobante</h2>
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
   
<form id="formularioConLoading" action="{{ route('comprobantes.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text"  value="CP{{$ultimo }}" max=10 name="id_simple" class="form-control" placeholder="" readonly>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
             <div class="form-group">
                 <strong>Viaje:</strong>
                @if( ! empty($viajeFinal[0]))   {{-- Con esto comprobamos cuando viene con un viaje, entonces cargamos los datos del viaje. --}}
                    <input type="hidden" id="viaje" name="viaje" value="{{$viajeFinal[0]->id}}">
                    <input type="text" id="viajeAutocomplete" value="{{$viajeFinal[0]->idSimpleViaje}}" maxlength="7" name="viajeVista" class="form-control" placeholder="Ingrese el código del viaje" autofocus required>
                    @else
                    <input type="hidden" id="viaje" name="viaje" value="">
                    <input type="text" id="viajeAutocomplete" value="" maxlength="7" name="viajeVista" class="form-control" placeholder="Ingrese el código del viaje" autofocus required>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Fecha:</strong>
                @if( ! empty($viajeFinal[0]))   {{-- Con esto comprobamos cuando viene con un viaje, entonces cargamos los datos del viaje. --}}
                    <input type="date" class="form-control" name="fecha" placeholder="" value="{{$viajeFinal[0]->fecha}}" required>
                @else
                    <input type="date" class="form-control" name="fecha" placeholder="" required>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Chofer:</strong>
                @if( ! empty($camioneroFinal[0]))   {{-- Con esto comprobamos cuando viene con un camionero, entonces cargamos los datos del camionero. --}}
                    <input type="hidden" id="camionero" name="camionero" value="{{$camioneroFinal[0]->id}}">
                    <input type="text" id="camioneroAutocomplete" value="{{$camioneroFinal[0]->apellido.' '.$camioneroFinal[0]->nombre}}" class="form-control" name="camioneroVista" placeholder="Ingrese Apellido"  required>
                @else
                    <input type="hidden" id="camionero" name="camionero" value="">
                    <input type="text" id="camioneroAutocomplete" value="" class="form-control" name="camioneroVista" placeholder="Ingrese Apellido"  required>
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="combustible">Combustible</option>
                    <option value="adelanto" {{ isset($camioneroFinal[0]) ? 'selected' : ''  }}>Adelanto</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <!-- Opcion 1 -->
                <strong id="lblGasoil" class="{{ isset($camioneroFinal[0]) ? 'd-none' : ''  }}">Lts Gasoil:</strong>
                <input type="number" id="inputGasoil" name="ltsgasoil" class="form-control {{ isset($camioneroFinal[0]) ? 'd-none' : ''  }}" placeholder="0" value="0" required>
                <!-- Opcion 2 -->
                <strong id="lblMedioPago" class="{{ isset($camioneroFinal[0]) ? ' ' : 'd-none'  }} ">Medio de pago:</strong>
                <select class="form-control {{ isset($camioneroFinal[0]) ? ' ' : 'd-none'  }}" name="medioPago" id="selectMedioPago">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
                <!--  -->
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Monto:</strong>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="number" name="monto" class="form-control" placeholder="0"  required>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                <textarea rows="3" class="form-control" name="detalles" placeholder=""></textarea>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
   
</form>

<script type="text/javascript">
        
        $(document).ready(function() {

            $(document).on('change','#tipo',function(){
                $("#lblGasoil,#inputGasoil").toggleClass("d-none");
                $("#lblMedioPago,#selectMedioPago").toggleClass("d-none");
            });


            //Autocompletado para camiones
            $( "#viajeAutocomplete" ).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{route('viajes.search')}}",
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
                                        label: obj.idSimpleviaje,
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
                        $('#viajeAutocomplete').val(ui.item.label); // display the selected text
                        $('#viaje').val(ui.item.value); // save selected id to input
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
            
            
        });
</script>
<script src="{{ asset('js/utilities.js')}}"></script>
@endsection