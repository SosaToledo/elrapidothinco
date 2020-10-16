@extends('layouts.app')

@section('title', 'Listado de comprobantes')
 
@section('content')

<!--  -->
    <div class="table table-responsive table-hover table-stripped">
        <table class="table">
            <thead>
                <tr class="bg-primary">
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
                        {{"$".number_format($i, 0,",",".")}}
                    </td>
                    @endforeach
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
    @endsection
