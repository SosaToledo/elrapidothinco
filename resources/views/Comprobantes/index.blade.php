@extends('layouts.app')

@section('title', 'Listado de comprobantes')
 
@section('content')

    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Comprobantes.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('comprobantes.create',['id'=>'new','viaje'=>'new']) }}"> <i class="fa fa-plus"></i> Nuevo Comprobante</a>
        </div>
    </div>

    @include('alertSessions')
       
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
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($comprobantes as $comprobante)
                <tr>
                    <td>{{ $comprobante->id_simple_comprobante }}</td>
                    <td>{{ isset($comprobante->idSimpleViaje) ? $comprobante->idSimpleViaje : '-' }}</td>
                    
                    <td>{{ ucfirst($comprobante->apellido).' '.ucfirst($comprobante->nombre) }}</td>
                    <td>{{ date("d/m/Y", strtotime($comprobante->fecha)) }}</td>
                    <td>{{ ucfirst($comprobante->tipo) }}</td>
                    <td>${{ $comprobante->monto }}</td>
                    <td>
                        <form id="formBorrar{{$comprobante->id}}" action="{{ route('comprobantes.destroy',$comprobante->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('comprobantes.edit',$comprobante->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="button" idParaBorrar="{{$comprobante->id}}" name="btn" class="submitBtn btn btn-danger" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @endif

</div>

@include('Modal.confirmacionBorrado')
<script src="{{ asset('js/utilities.js')}}"></script>



@endsection