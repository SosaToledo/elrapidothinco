@extends('layouts.app')

@section('title', 'Listado de viajes')

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Viajes.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('viajes.create') }}"> <i class="fa fa-plus"></i> Nuevo Viaje</a>
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


    @if($viajes->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Cliente</th>
                <th>Camionero</th>
                <th>Camion</th>
                <th>Fecha</th>
                <th width="320px">Acciones</th>
            </tr>
            @foreach ($viajes as $viaje)
            <tr>
                <td>{{ $viaje->idSimpleViaje }}</td>
                <td>{{ $viaje->nombre }}</td>
                <td>{{ $viaje->id_simple_camioneros }}</td>
                <td>{{ $viaje->id_simple_camiones }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>
                    <form action="{{ route('viajes.destroy',$viaje->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('viajes.show',$viaje->id) }}"> <i class="fa fa-eye"></i> Detalle</a>
                        <a class="btn btn-primary" href="{{ route('viajes.edit',$viaje->id) }}"> <i class="fa fa-edit"></i> Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

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