@extends('layouts.app')

@section('title', 'Editando '.$comprobante[0]->id_simple_comprobante)

@section('content')

<style>
  @media print {     .no-print, .no-print * {         display: none !important;     } .solo-imprimible{ display: flex !important;}}
  .solo-imprimible{
      display: none;
  }
</style>

<div class="row no-print">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('comprobantes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editar Comprobante {{$comprobante[0]->id_simple_comprobante}}</h2>
        </div>

        <a href="#" id="imprimirDiv" class="{{ $comprobante[0]->tipo ==  'adelanto' ? '' : 'd-none'  }} btn btn-danger float-right no-print"> <i class="fa fa-print"></i> Imprimir Recibo</a>
    </div>
</div>
<hr class="no-print">

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

<form id="formularioConLoading" action="{{ route('comprobantes.update', $comprobante[0]->id) }}" class="no-print" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
    
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <strong>CODIGO:</strong>
            <input type="text"  value="{{$comprobante[0]->id_simple_comprobante}}" max=10 name="id_simple" class="form-control" placeholder="" readonly>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Viaje:</strong>
                <input type="hidden" id="viaje" value="{{$comprobante[0]->id_viaje}}" name="viaje">
                <input type="text" id="viajeAutocomplete" value="{{$comprobante[0]->idSimpleViaje }}" maxlength="7" name="viajeVista" class="form-control" placeholder="Ingrese el código del viaje" autofocus required>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input type="date" class="form-control" name="fecha" placeholder="" value="{{$comprobante[0]->fecha}}" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Chofer:</strong>
                <input type="hidden" id="camionero" name="camionero" value="{{$comprobante[0]->id_camioneros}}">
                <input type="text" id="camioneroAutocomplete" class="form-control" value="{{$comprobante[0]->apellido.' '.$comprobante[0]->nombre}}" name="camioneroVista" placeholder="Ingrese Apellido" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="combustible" {{ old('tipo',$comprobante[0]->tipo)=='combustible' ? 'selected' : ''  }}>Combustible</option>
                    <option value="adelanto" {{ old('tipo',$comprobante[0]->tipo)=='adelanto' ? 'selected' : ''  }}>Adelanto</option>
                </select>
                <!-- <input type="text" class="form-control" name="tipo" placeholder=""> -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong id="lblGasoil" class="{{ $comprobante[0]->tipo=='combustible' ? '' : 'd-none' }}">Lts Gasoil:</strong>
                <strong id="lblMedioPago" class="{{ $comprobante[0]->tipo=='combustible' ? 'd-none' : '' }}">Medio de pago:</strong>
                <input type="number" id="inputGasoil" name="ltsgasoil" class="form-control {{ $comprobante[0]->tipo=='combustible' ? '' : 'd-none' }}" placeholder="0" value="{{$comprobante[0]->ltsgasoil}}" required>
                <select class="form-control {{ $comprobante[0]->tipo=='combustible' ? 'd-none' : '' }}" name="medioPago" id="selectMedioPago">
                    <option value="Efectivo" {{ old('tipo',$comprobante[0]->medioPago)=='Efectivo' ? 'selected' : ''  }}>Efectivo</option>
                    <option value="Transferencia" {{ old('tipo',$comprobante[0]->medioPago)=='Transferencia' ? 'selected' : ''  }}>Transferencia</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <strong>Monto:</strong>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="float" name="monto" class="form-control" placeholder="0" value="{{$comprobante[0]->monto}}" required>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                <textarea rows="3" class="form-control" name="detalles" placeholder="">{{$comprobante[0]->detalles}}</textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
        $('#imprimirDiv').click(function(){
            window.print();
        });

        $(document).on('change','#tipo',function(){
            $("#lblGasoil,#inputGasoil").toggleClass("d-none");
            $("#lblMedioPago,#selectMedioPago").toggleClass("d-none");
        });

        //Autocompletado para camiones
        $("#viajeAutocomplete").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('viajes.search')}}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {

                        if (!data.length) {
                            var result = [{
                                label: 'Sin resultados',
                                value: response.term
                            }];
                            response(result);
                        } else {
                            var resp = $.map(data, function(obj) {
                                //console.log(obj);
                                return {
                                    label: obj.id_viaje_simple,
                                    value: obj.id
                                }
                            });
                            response(resp);
                        }
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                if (ui.item.label == "Sin resultados") {
                    event.preventDefault();
                } else {
                    $('#viajeAutocomplete').val(ui.item.label); // display the selected text
                    $('#viaje').val(ui.item.value); // save selected id to input
                    return false;
                }
            },
            focus: function(event, ui) {
                return false;
            }
        });


        //camioneros autocomplete
        $("#camioneroAutocomplete").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('camioneros.search')}}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {

                        if (!data.length) {
                            var result = [{
                                label: 'Sin resultados',
                                value: response.term
                            }];
                            response(result);
                        } else {
                            var resp = $.map(data, function(obj) {
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
            select: function(event, ui) {
                if (ui.item.label == "Sin resultados") {
                    event.preventDefault();
                } else {
                    $('#camioneroAutocomplete').val(ui.item.label); // display the selected text
                    $('#camionero').val(ui.item.value); // save selected id to input
                    return false;
                }
            },
            focus: function(event, ui) {
                return false;
            }
        });


    });
</script>

<div class="card mt-3 solo-imprimible">
    <div class="card-header">
        <h5> Transporte y logistica M.Fanucchi SA</h5>
        <div class="row">
            <div class="col-sm-9 ml-3">
                <p>
                    Pedro Ugarte 74 - 2700 Pergamino<br>
                    IVA Responsable Inscripto <br>
                    CUIT: 30-71596758-4 <br>
                    CUIT: 20-27121501-1                     
                </p>
            </div>
            <div class="col">
                <p>
                    Comprobante: {{$comprobante[0]->id_simple_comprobante}} <br>
                    Fecha: {{ date("d/m/Y", strtotime(date("Y/m/d"))) }}
                </p>
            </div>
        </div>
    </div>
    <div class="card-body">
        El dia {{ date("d/m/Y", strtotime($comprobante[0]->fecha)) }} el chofer
        {{ $comprobante[0]->apellido.' '.$comprobante[0]->nombre}} 
        con cuil {{ $comprobante[0]->dni }} recibió ${{$comprobante[0]->monto}} en concepto de 
        adelanto. 
        Forma de pago 
        {{$comprobante[0]->medioPago==='Transferencia' ? 
            $comprobante[0]->medioPago." depositado en la cuenta ".$comprobante[0]->cbu : 'Efectivo'}}  <!--  pagado en <strong>Agregar medio de pago, efectivo o transferencia</strong> -->
        <br>
        <br>
        <cite>{{$comprobante[0]->detalles}}</cite>
    </div>
    <div class="row m-3">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col text-center mt-5 pt-3">
            <hr>
            {{$comprobante[0]->apellido.' '.$comprobante[0]->nombre}}
        </div>
    </div>    
</div>
<script src="{{ asset('js/utilities.js')}}"></script>

@endsection