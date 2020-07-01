@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD CAMIONES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('camiones.create') }}"> Crear nuevo Camión</a>
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
            <th>Patente</th>
            <th>VTV venc.</th>
            <th>SENASA venc.</th>
            <th>Seguro venc.</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($camiones as $camion)
        <tr>
            <td>{{ $camion->id_simple_camiones }}</td>
            <td>{{ $camion->patente }}</td>
            <td>{{ $camion->vtv_vencimiento }}</td>
            <td>{{ $camion->senasa_vencimiento }}</td>
            <td>{{ $camion->seguro_vencimiento }}</td>
            <td>
                <form action="{{ route('camiones.destroy',$camion->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('camiones.edit',$camion->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $camiones->links() !!}
      
@endsection