@extends('layouts.app')

@section('title', 'Listado de viajes')

@section('styles')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@stop

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-7 margin-tb">
            <h2>Viajes.</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"> <i class="fa fa-search"></i></span>
                </div>
                <input type="search" id="SearchText" class="form-control float-right" placeholder="Buscar en la tabla">
            </div>
        </div>
        <div class="col-md-2">
            <a class="btn btn-success float-right" href="{{ route('viajes.create') }}"> <i class="fa fa-plus"></i> Nuevo Viaje</a>
        </div>
    </div>
   

    @include('alertSessions')

    @if($viajes->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table id="tableIndex"  class="table table-hover table-striped">
                <thead>
                    <tr class="">
                        <th>CODIGO</th>
                        <th>Cliente</th>
                        <th>Chofer</th>
                        <th>Camion</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th width="380px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viajes as $viaje)
                    <tr>
                        <td>{{ $viaje->idSimpleViaje }}</td>
                        <td>{{ $viaje->nombre }}</td>
                    <td>{{ $viaje->apellido .' '. $viaje->nombreCamionero }}</td>
                    <td>{{ $viaje->id_simple_camiones }}</td>
                    <td>{{ date("d/m/Y", strtotime($viaje->fecha)) }}</td>
                    <td>{{ $viaje->estados}}</td>
                    <td>
                        <form id="formBorrar{{$viaje->id}}" action="{{ route('viajes.destroy',$viaje->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('createWithData',['camionero'=>$viaje->camioneroId,'viaje'=>$viaje->id]) }}"> <i class="fa fa-plus"></i> Comprobante</a>
                            <a class="btn btn-primary" href="{{ route('viajes.edit',$viaje->id) }}"> <i class="fa fa-edit"></i> Editar</i></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" idParaBorrar="{{$viaje->id}}" codigoSimple="{{$viaje->idSimpleViaje}}" name="btn" class="btn btn-danger submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

{{-- Style del boton search en el php del modal --}}
@include('Modal.confirmacionBorrado')
{{-- Inicio de la tabla en utilities.js --}}
<script src="{{ asset('js/utilities.js')}}"></script>

@endsection