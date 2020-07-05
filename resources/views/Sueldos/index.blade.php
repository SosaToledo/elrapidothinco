@extends('layouts.app')
@section('title', 'Liquidación de sueldos')

@section('content')
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
    <table class="table table-hover">
      <tr>
        <th>Fecha</th>
        <th>Sueldo</th>
        <th>Viaticos</th>
        <th>Adelantos</th>
      </tr>
      @foreach($detalles_sueldo as $viajes)
        <tr>
          <td>{{$viajes->fecha}}</td>
          <td>{{$viajes->ganancia_camionero}}</td>
          <td>{{$viajes->peajes}}</td>
          <td>{{$viajes->monto}}</td>
        </tr>
      @endforeach
    </table>
  </div>
  @endif
  
@endsection