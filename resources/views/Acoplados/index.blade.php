@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD ACOPLADOS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('acoplados.create') }}"> Crear nuevo Acoplado</a>
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
            <th>ID</th>
            <th>Patente</th>
            <th>VTV venc.</th>
            <th>SENASA venc.</th>
            <th>Seguro venc.</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($acoplados as $acoplado)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $acoplado->id_simple_acoplado }}</td>
            <td>{{ $acoplado->patente }}</td>
            <td>{{ $acoplado->vtv_vencimiento }}</td>
            <td>{{ $acoplado->senasa_vencimiento }}</td>
            <td>{{ $acoplado->seguro_vencimiento }}</td>
            <td>
                <form action="{{ route('acoplados.destroy',$acoplado->id_acoplado) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('acoplados.edit',$acoplado->id_acoplado) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $acoplados->links() !!}
      
@endsection