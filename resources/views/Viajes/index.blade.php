@extends('layouts.app')
 
@section('content')

<div class="">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Viajes.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('viajes.create') }}">Nuevo Viaje</a>
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
                <th>Acoplado</th>
                <th>Km Inicial</th>
                <th>Km final</th>
                <th>Distancia</th>
                <th>Origen</th>
                <th>Destinos</th>
                <th>Valor</th>
                <th>18% Camionero</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Peajes</th>
                <th>Gasoil (litros)</th>
                <th>Gasoil (precio)</th>
                <th>Nota de viaje</th>
                <th>Guia</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($viajes as $viaje)
            <tr>
                <td>{{ $viaje->idSimpleViaje }}</td>
                <td>{{ $viaje->id_cliente }}</td>
                <td>{{ $viaje->id_camionero }}</td>
                <td>{{ $viaje->id_camiones }}</td>
                <td>{{ $viaje->id_acomplado }}</td>
                <td>{{ $viaje->km_inicial }}</td>
                <td>{{ $viaje->km_final }}</td>
                <td>{{ $viaje->distancia }}</td>
                <td>{{ $viaje->origen }}</td>
                <td>{{ $viaje->destino }}</td>
                <td>{{ $viaje->valor }}</td>
                <td>{{ $viaje->ganancia_camionero }}</td>
                <td>{{ $viaje->tipoCamion }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->peajes }}</td>
                <td>{{ $viaje->gasoil_litros }}</td>
                <td>{{ $viaje->gasoil_precio }}</td>
                <td>{{ $viaje->notaViaje }}</td>
                <td>{{ $viaje->guia }}</td>
                <td>
                    <form action="{{ route('viajes.destroy',$viaje->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('viajes.edit',$viaje->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $viajes->links() !!}

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