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
                    <td>{{ $comprobante->id_simple_comprobantes }}</td>
                    <td>{{ $comprobante->id_simple_viaje }}</td>
                    <td>{{ $comprobante->apellido." ".$comprobante->nombre }}</td>
                    <td>{{ $comprobante->detalle }}</td>
                    <td>{{ $comprobante->tipo }}</td>
                    <td>${{ $comprobante->monto }}</td>
                    <td>
                        <form action="{{ route('comprobantes.destroy',$comprobante->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('comprobantes.edit',$comprobante->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $comprobantes->links() !!}

    @endif
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