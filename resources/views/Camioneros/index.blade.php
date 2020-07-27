@extends('layouts.app')
@section('title', 'Listado de camioneros')


@section('content')
<div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Camioneros.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('camioneros.create') }}"> <i class="fa fa-plus"></i> Nuevo Camionero</a>
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
   
    @if($camioneros->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>DNI</th>
                <th>Apellido y Nombre </th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th width="380px">Acciones</th>
            </tr>
            @foreach ($camioneros as $camionero)
                <tr>
                    <td>{{ $camionero->id_simple_camioneros }}</td>
                    <td>{{ $camionero->DNI }}</td>
                    <td>{{ $camionero->apellido." ".$camionero->nombre }}</td>
                    <td>{{ $camionero->direccion }}</td>
                    <td>{{ $camionero->telefono }} 
                                       
                    </td>
                    <td>
                        <form id="formBorrar{{$camionero->id}}" action="{{ route('camioneros.destroy',$camionero->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('camioneros.edit',$camionero->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('comprobantes.show',2)}}"><i class="fa fa-money"></i> Adelanto</a>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $camionero->telefono}}"> <button class="btn btn-success"><i class="fa fa-whatsapp"></i></button></a>
                            @csrf
                            @method('DELETE')
                            <button type="button"  idParaBorrar="{{$camionero->id}}" codigoSimple="{{$camionero->id_simple_camioneros}}"  name="btn" class="btn btn-danger submitBtn" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $camioneros->links() !!}

    @endif
</div>

@include('Modal.confirmacionBorrado')
<script src="{{ asset('js/utilities.js')}}"></script>

@endsection