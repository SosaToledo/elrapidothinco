@extends('layouts.app')
@section('title', 'Listado de camiones')
 
@section('content')
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Camiones.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('camiones.create') }}"> <i class="fa fa-plus"></i> Nuevo Camión</a>
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
   

    @if($camiones->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Patente</th>
                <th>Venc VTV</th>
                <th>Venc SENASA</th>
                <th>Venc Seguro</th>
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
                            <a class="btn btn-primary" href="{{ route('camiones.edit',$camion->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $camiones->links() !!}

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