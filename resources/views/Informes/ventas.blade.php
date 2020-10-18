@extends('layouts.app')

@section('title', 'Listado de comprobantes')

@section('content')

<!--  -->
<div class="d-flex justify-content-between">
    <div class="mb-3">
        <h4><i class="fa fa-truck"></i> Viajes por Camión</h4>
    </div>
    <form action="{{ route('informes.ventas')}}" method="POST" class="form-inline">
        @csrf
        @method('GET')

        <label class="my-1 mb-2 mr-3" for="periodo">Periodo comprendido: </label>

        <select class="form-control mb-2 mr-sm-2" name="periodo" id="periodo">
            <option value="2020">2020</option>
            <option value="2019">2019</option>
        </select>

        <button class="btn btn-primary mb-2">Cambiar periodo</button>
    </form>
</div>
<hr>
<!--  -->
@if( sizeof( $filas ) == 0 )
<div class="text-center">
    <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
    <p>No se encontraron resultados.</p>
</div>
@else

<div class="table table-responsive table-hover table-stripped">
    <table class="table">
        <thead>
            <tr class="bg-primary text-white">
                <th></th>
                @foreach($columnas as $columna)
                <th>{{$columna}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($filas as $fila => $fi)
            <tr>
                <td>
                    <strong>{{$fila}}</strong>
                </td>
                @foreach ($fi as $i )
                <td>
                    <!-- Es una negrada poner un solo tag, pero ayuda a la mantenibilidad del codigo no tener que repetir otro if para cerrar la etiqueta -->
                    @if ($loop -> last )
                    <strong>
                        @endif
                        {{ "$".number_format($i, 0,",",".")}}
                </td>
                @endforeach
            </tr>
            @endforeach
            

        </tbody>
    </table>
</div>
@endif

@endsection