@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="container">
    <div class="row">

        @if (isset($viajesIniciados))
            <div class="card border-primary " style="width: 18rem;">
                <div class="card-header text-center">Viajes Iniciados</div>
                <div class="card-body text-center">
                    <h1> {{ $viajesIniciados[0]->CantViajes }}</h2>
                </div>
            </div>
        @endif
    </div>
    <hr>
    <br>

@if(!$viajes->isEmpty())
    <h4>Viajes iniciados actualmente</h4>
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Cliente</th>
                <th>Camionero</th>
                <th>Camion</th>
                <th>Fecha</th>
                <th width="120px">Acciones</th>
            </tr>
            @foreach ($viajes as $viaje)
            <tr>
                <td>{{ $viaje->idSimpleViaje }}</td>
                <td>{{ $viaje->nombre }}</td>
                <td>{{ $viaje->apellido }}</td>
                <td>{{ $viaje->id_simple_camiones }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('viajes.edit',$viaje->id) }}"><i class="fa fa-edit"></i> Editar</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endif
    
</div>
@endsection
