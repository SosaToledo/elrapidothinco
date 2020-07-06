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
   
    <table class="table table-bordered">
        <tr>
            <th>CODIGO</th>
            <th>Fecha</th>
            <th>Viaje</th>
            <th>Camionero</th>
            <th>detalles</th>
            <th>Tipo</th>
            <th>Monto</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($comprobantes as $comprobante)
        <tr>
            <td>{{ $comprobante->id }}</td>
            <td>{{ $comprobante->fecha }}</td>
            <td>{{ $comprobante->id_viaje }}</td>
            <td>{{ $comprobante->id_camioneros}}</td>
            <td>{{ $comprobante->detalles }}</td>
            <td>{{ $comprobante->tipo }}</td>
            <td>{{ $comprobante->monto }}</td>
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


    </div>
   

<script>
    $(document).ready(function() {
       // show the alert
       setTimeout(function() {
            //$(".success-alert").alert('close');
            //$('#btnCerrar').click();
            jQuery('#success-alert').fadeOut();
       }, 2000);
    });
</script>

@endsection