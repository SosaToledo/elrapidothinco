@extends('layouts.app')
@section('title', 'Listado de comprobantes')
 
@section('content')
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Comprobantes.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('comprobantes.create') }}"> <i class="fa fa-plus"></i> Nuevo Comprobante</a>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div id="success-alert" class="alert alert-success alert-dimissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    @endif
   
    @if($comprobantes->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Viaje</th>
                <th>Camionero</th>
                <th>Detalle</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($comprobantes as $comprobante)
                <tr>
                    <td>{{ $comprobante->id_simple_comprobante }}</td>
                    <td>{{ $comprobante->idSimpleViaje }}</td>
                    <td>{{ $comprobante->nombre }}</td>
                    <td>{{ $comprobante->detalles }}</td>
                    <td>{{ $comprobante->tipo }}</td>
                    <td>${{ $comprobante->monto }}</td>
                    <td>
                        <form id="formBorrar" action="{{ route('comprobantes.destroy',$comprobante->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('comprobantes.edit',$comprobante->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="button" name="btn" class="btn btn-danger" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @endif

</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Borrado de elemento
            </div>
            <div class="modal-body">
                <i>
                    ¿Estas seguro de lo que vas a hacer?
                </i>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" id="submit" class="btn btn-danger danger"> <i class="fa fa-remove"></i> Si, borrar</a>
            </div>
        </div>
    </div>
</div>



@endsection