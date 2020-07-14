@extends('layouts.app')
@section('title', 'Nuevo comprobante')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('comprobantes.index') }}"><i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo comprobante</h2>
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
   
<form action="{{ route('comprobantes.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-sm-12 col-md-4 lg-4">
             <div class="form-group">
                 <strong>Viaje:</strong>
                 <input type="hidden" id="viaje" name="viaje" >
                 <input type="text" id="viajeAutocomplete" maxlength="7" name="viajeVista" class="form-control" placeholder="Ingrese el código del viaje">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-4">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input type="date" class="form-control" name="fecha" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-4">
            <div class="form-group">
                <strong>Camionero:</strong>
                <input type="hidden" id="camionero" name="camionero" >
                <input type="text" id="camioneroAutocomplete" class="form-control" name="camioneroVista" placeholder="Ingrese Apellido" >
            </div>
        </div>

        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <!-- <select class="form-control" name="tipo" id="tipo">
                    <option value="combustible">Combustible</option>
                    <option value="adelanto">Adelanto</option>
                </select> -->
                <input type="text" class="form-control" name="tipo" placeholder="" value="{{$comprobante}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Monto:</strong>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="float" name="monto" class="form-control" placeholder="00.00" >
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                <textarea required rows="3" class="form-control" name="detalles" placeholder=""></textarea>
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

@endsection