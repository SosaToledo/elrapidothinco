@extends('layouts.app')
@section('title', 'Listado de camiones')
 
@section('content')
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Camiones.</h2>
        </div>
        <div class="col-md-6">
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
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Patente</th>
                <th>Venc VTV</th>
                <th>Venc SENASA</th>
                <th>Venc Seguro</th>
                <th>Venc Ruta</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($camiones as $camion)
                <tr>
                    <td>{{ $camion->id_simple_camiones }}</td>
                    <td>{{ $camion->patente }}</td>
                    <td>{{ $camion->vtv_vencimiento }}</td>
                    <td>{{ $camion->senasa_vencimiento }}</td>
                    <td>{{ $camion->seguro_vencimiento }}</td>
                    <td>{{ $camion->ruta_vencimiento }}</td>
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
        </table>
    </div>

    {!! $camiones->links() !!}

    @endif
</div>
   
@include('Modal.confirmacionBorrado')

<script src="{{ asset('js/utilities.js')}}"></script>

@endsection