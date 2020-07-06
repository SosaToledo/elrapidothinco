@extends('layouts.app')
@section('title', 'Liquidación de sueldos')

@section('content')
  @php
    $sueldos = 0;
    $viaticos = 0; 
    $adelantos = 0;
  @endphp
  <form action="{{ route('sueldos.create')}}" method="GET">
  @csrf
  @method('GET')
    <label for="camionero">Seleccione camionero:</label>
    <select name="camionero" id="camionero">
      @foreach ($camioneros as $camionero)
        <option value='{{$camionero->id}}'>
         {{$camionero->apellido.' '.$camionero->nombre}}
        </option>
      @endforeach
    </select>
    <label for="">Rango de fechas</label>
    <input type="date" name="fecha_inicio" placeholder="Fecha de inicio">
    <input type="date" name="fecha_fin" placeholder="Fecha final">
    <button type="submit">Buscar</button>
  </form>

  @if(count($detalles_sueldo ?? '')==0)
 
  @else
  <div class="table-responsive mt-3">
    <h3>{{$detalles_sueldo[0]->apellido." ".$detalles_sueldo[0]->nombre}}</h3>
    <h4>Viajes</h4>
    <table class="table table-hover">
      <tr>
        <th>Fecha</th>
        <th>id</th>
        <th>Sueldo</th>
        <th>Viaticos</th>
      </tr>
      @foreach($detalles_sueldo as $viajes)
        <tr>
          <td>{{$viajes->fecha}}</td>
          <td>{{$viajes->id}}</td>
          <td>{{$viajes->ganancia_camionero}}</td>
            @php
              $sueldos = $sueldos + $viajes->ganancia_camionero
            @endphp
          <td>{{$viajes->peajes}}</td>
            @php
              $viaticos = $viaticos + $viajes->peajes
            @endphp
        </tr>
      @endforeach
    </table>
  </div>

  <div class="table-responsive mt-3">
    <h4>Adelantos</h4>
    <table class="table table-hover">
      <tr>
        <th>Fecha</th>
        <th>Id del viaje</th>
        <th>Monto</th>
      </tr>
      @foreach($detalles_adelanto as $adelanto)
        <tr>
          <td>{{$adelanto->fecha}}</td>
          <td>{{$adelanto->id_viaje}}</td>
          <td>{{$adelanto->monto}}</td>
          @php
            $adelantos = $adelantos + $adelanto->monto
          @endphp
        </tr>
      @endforeach
    </table>
  </div>
  @endif
  <div style="position:fixed; bottom: 0;" class="table-responsive mt-3">
    <table class="table table-hover">
      <tr>
        <th>Sueldo</th>
        <th>Viaticos</th>
        <th>Adelanto</th>
        <th>Total</th>
      </tr>
      <tr>
        <td id="">{{$sueldos}}</td>
        <td id="">{{$viaticos}}</td>
        <td id="">{{$adelantos}}</td>
        <td>{{$sueldos + $viaticos - $adelantos}}</td>
      </tr>
    </table>
  </div>
@endsection