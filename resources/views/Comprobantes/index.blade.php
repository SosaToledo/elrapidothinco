@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD COMPROBANTES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('comprobantes.create') }}"> Crear nuevo comprobante</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>CODIGO</th>
            <th>Viaje</th>
            <th>Camionero</th>
            <th>detalles</th>
            <th>Tipo</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($comprobantes as $comprobante)
        <tr>
            <td>{{ $comprobante->id }}</td>
            <td>{{ $comprobante->id_viaje }}</td>
            <td>{{ $comprobante->id_camioneros}}</td>
            <td>{{ $comprobante->detalles }}</td>
            <td>{{ $comprobante->tipo }}</td>
            <td>
                <form action="{{ route('comprobantes.destroy',$comprobante->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('comprobantes.edit',$comprobante->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $comprobantes->links() !!}
      
@endsection