@extends('layouts.app')
@section('title', 'Listado de camiones')
 
@section('styles')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-7 margin-tb">
            <h2>Camiones.</h2>
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
            <a class="btn btn-success float-right" href="{{ route('camiones.create') }}"> <i class="fa fa-plus"></i> Nuevo Camión</a>
        </div>
    </div>
   
    @include('alertSessions')

    @if($camiones->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table id="tableIndex" class="table table-striped table-hover">
            <thead>
                <tr class="">
                    <th>CODIGO</th>
                    <th>Patente</th>
                    <th>Venc VTV</th>
                    <th>Venc SENASA</th>
                    <th>Venc Seguro</th>
                    <th>Venc Ruta</th>
                    <th width="280px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($camiones as $camion)
                    <tr>
                        <td>{{ $camion->id_simple_camiones }}</td>
                        <td>{{ $camion->patente }}</td>
                        <!-- El calculo del vencimiento lo hace en utilities.js -->
                        <td class="fechaConVto">{{ date("d/m/Y", strtotime($camion->vtv_vencimiento)) }}</td>
                        <td class="fechaConVto">{{ date("d/m/Y", strtotime($camion->senasa_vencimiento)) }}</td>
                        <td class="fechaConVto">{{ date("d/m/Y", strtotime($camion->seguro_vencimiento)) }}</td>
                        <td class="fechaConVto">{{ date("d/m/Y", strtotime($camion->ruta_vencimiento)) }}</td>
                        <td>
                            <form id="formBorrar{{$camion->id}}" action="{{ route('camiones.destroy',$camion->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('camiones.edit',$camion->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="button"  idParaBorrar="{{$camion->id}}" codigoSimple="{{$camion->id_simple_camiones}}"  name="btn" class="btn btn-danger submitBtn" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @endif
</div>
   
@include('Modal.confirmacionBorrado')
<script src="{{ asset('js/utilities.js')}}"></script>

@endsection