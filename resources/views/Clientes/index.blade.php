@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD CLIENTES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clientes.create') }}"> Crear nuevo Cliente</a>
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
            <th>CUIL</th>
            <th>Razón social</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id_simple_clientes }}</td>
            <td>{{ $cliente->CUIL }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->correo}}</td>
            <td>
                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $clientes->links() !!}
      
@endsection