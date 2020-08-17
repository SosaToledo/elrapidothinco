@extends('layouts.app')
@section('title', 'Liquidación de sueldos')

@section('content')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

<style>
  @media print {     .no-print, 	.no-print * {         display: none !important;     } }
</style>

  @php
    $sueldos = 0;
    $viaticos = 0; 
    $adelantos = 0;
  @endphp
  <div class="no-print">

    <div class="container">
      <form action="{{ route('sueldos.create')}}" method="GET" class="row">
        @csrf
      @method('GET')
      
      <div class="form-group col-4 ">
        <label for="camionero" >Seleccione camionero: </label>
        <select class="form-control" class="" name="camionero" id="camionero">
          @foreach ($camioneros as $camionero)
          <option value='{{$camionero->id}}'>
            {{$camionero->apellido.' '.$camionero->nombre}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-6">
        <label for="">Rango de fechas: </label>
        <div class="form-inline">
          <input class="form-control mr-3" id="desdeFecha" type="date" name="fecha_inicio" placeholder="Fecha de inicio" >
          <input class="form-control" id="hastaFecha" type="date" name="fecha_fin" placeholder="Fecha final">
        </div>
      </div>
      <div class="form-group col-2">
        <label for="">&#160;</label>
        <div class="form-inline">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
        </div>
      </div>
    </form>
  </div>
  
  
  @if(count($detalles_sueldo ?? '')==0)
  
  <div class="alert alert-primary alert-dimissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <p>Sin resultados.</p>
  </div>        
  
  @else
  <hr>
  </div>
  
  <div id="ResumenEmpleado">
    <div class="table-responsive mt-3">
      <div class="text-center" >
        <h3><i class="fa fa-users"></i> {{$detalles_sueldo[0]->apellido." ".$detalles_sueldo[0]->nombre}}
        <a href="#" id="imprimirDiv" class="btn btn-danger float-right no-print"> <i class="fa fa-print"></i> Imprimir</a>
      </h3>
    </div>
    <br>
    <h4><i class="fa fa-bus"></i> Viajes</h4>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th style="width: 150px">Fecha</th>
          <th style="width: 150px;">COD Viaje</th>
          <th style="width: 150px;">Guía</th>
          <th style="width: 150px;">Sueldo</th>
          <th style="width: 150px;">Viaticos</th>
          <th style="width: 50px;">Detalle</th>
        </tr>
      </thead>
      @foreach($detalles_sueldo as $viajes)
        <tr>
          <td>{{$viajes->fecha}}</td>
          <td>{{$viajes->idSimpleViaje}}</td>
          <td>{{$viajes->guia}}</td>
          <td>${{$viajes->ganancia_camionero}}</td>
          <td>${{$viajes->peajes}}</td>
          <td><a href="{{ route('viajes.edit',$viajes->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
            @php
              $sueldos = $sueldos + $viajes->ganancia_camionero;
              $viaticos = $viaticos + $viajes->peajes;
            @endphp
        </tr>
      @endforeach
    </table>
  </div>

    
    @if($detalles_adelanto->isEmpty())
      <div class="alert alert-info alert-dimissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <p>Este camionero no tiene adelantos.</p>
      </div>                                    
    @else
    <div id="adelantos" class="table-responsive mt-3">
    <h4><i class="fa fa-money"></i> Adelantos</h4>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th style="width: 80px;">Fecha</th>
          <th style="width: 80px;">COD Viaje</th>
          <th style="width: 80px;">Monto</th>
          <th style="width: 150px;">Detalle</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead>
  
      @foreach($detalles_adelanto as $adelanto)
        <tr>
          <td>{{$adelanto->fecha}}</td>
          <td>{{ isset($adelanto->idSimpleViaje) ? $adelanto->idSimpleViaje : '-' }}</td>
          <td>${{$adelanto->monto}}</td>
          <td>
            {{ $adelanto->detalles==="" ? '-' : \Illuminate\Support\Str::limit($adelanto->detalles, 150, $end='...') }}
          </td>
          <td><a href="{{ route('comprobantes.edit',$adelanto->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
          @php
            $adelantos = $adelantos + $adelanto->monto
          @endphp
        </tr>
      @endforeach

      </table>
    </div>
    @endif
  
  @endif

  @if($sueldos != 0)
  <div style="position:fixed; bottom: 0;" class="container table-responsive mt-3">
    <table class="table table-hover">
      <tr>
        <th>Sueldo</th>
        <th>Viaticos</th>
        <th>Adelanto</th>
        <th>Total</th>
      </tr>
      <tr>
        <td id="">${{$sueldos}}</td>
        <td id="">${{$viaticos}}</td>
        <td id="">${{$adelantos}}</td>
        <td><strong>${{$sueldos + $viaticos - $adelantos}}</strong></td>
      </tr>
    </table>
  </div>
  @endif
  </div>

<script>
    
    $(document).ready(function() {
      
      var d = new Date();
      var firstDay =  new Date(d.getFullYear(), d.getMonth(), 1);
      var lastDay =  new Date(d.getFullYear(), d.getMonth() + 1, 0);
      $('#desdeFecha').val(firstDay.toISOString().split('T')[0]).trigger('change');
      $('#hastaFecha').val(lastDay.toISOString().split('T')[0]).trigger('change');

      $('#imprimirDiv').click(function(){
        window.print();
      });

    });
</script>

@endsection