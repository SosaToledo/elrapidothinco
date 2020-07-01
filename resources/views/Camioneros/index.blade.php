@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD CAMIONEROS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('camioneros.create') }}"> Crear nuevo Camionero</a>
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
            <th>DNI</th>
            <th>Apellido y Nombre </th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($camioneros as $camionero)
        <tr>
            <td>{{ $camionero->id_simple_camioneros }}</td>
            <td>{{ $camionero->DNI }}</td>
            <td>{{ $camionero->apellido.' '.$camionero->nombre }}</td>
            <td>{{ $camionero->direccion }}</td>
            <td>{{ $camionero->telefono }}</td>
            <td>
                <form action="{{ route('camioneros.destroy',$camionero->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('camioneros.edit',$camionero->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $camioneros->links() !!}
      
@endsection