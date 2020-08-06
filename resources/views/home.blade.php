@extends('layouts.app')

@section('title', 'Dashboard')

@if($viajes->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
@else

@section('content')
<div class="container">
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
                <td>{{ $viaje->apellido }}</td>
                <td>{{ $viaje->id_simple_camiones }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>
                    <form id="formBorrar" action="{{ route('viajes.destroy',$viaje->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('viajes.edit',$viaje->id) }}"> <i class="fa fa-edit"></i>/<i class="fa fa-eye"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endif
@endsection
