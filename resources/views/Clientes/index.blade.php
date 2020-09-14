@extends('layouts.app')
@section('title', 'Listado de clientes')
 
@section('styles')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-7 margin-tb">
            <h2>Clientes.</h2>
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
            <a class="btn btn-success float-right" href="{{ route('clientes.create') }}"> <i class="fa fa-plus"></i> Nuevo Cliente</a>
        </div>
    </div>
   

    @include('alertSessions')
   
    
    @if($clientes->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table id="tableIndex" class="table table-hover table-striped">
            <thead>
                <tr class="">
                    <th>CODIGO</th>
                    <th>CUIT</th>
                    <th>Razón social</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th width="280px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_simple_clientes }}</td>
                    <td>{{ $cliente->CUIL }}</td>
                    <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->correo}}</td>
                    <td>
                        <form id="formBorrar{{$cliente->id}}" action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $cliente->telefono}}"> <button type="button" class="btn btn-success"><i class="fa fa-whatsapp"></i></button></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" idParaBorrar="{{$cliente->id}}" codigoSimple="{{$cliente->id_simple_clientes}}" name="btn" class="btn btn-danger submitBtn" data-toggle="modal" data-target="#confirm-submit"> <i class="fa fa-trash"></i> Borrar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- {!! $clientes->links() !!} --}}

    @endif
</div>

@include('Modal.confirmacionBorrado')
<script src="{{ asset('js/utilities.js')}}"></script>

@endsection


