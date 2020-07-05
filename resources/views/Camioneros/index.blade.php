@extends('layouts.app')
@section('title', 'Listado de camioneros')


@section('content')
<div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Camioneros.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('camioneros.create') }}"> <i class="fa fa-plus"></i> Nuevo Camionero</a>
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
   
    @if($camioneros->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>DNI</th>
                <th>Apellido y Nombre </th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($camioneros as $camionero)
                <tr>
                    <td>{{ $camionero->id_simple_camioneros }}</td>
                    <td>{{ $camionero->DNI }}</td>
                    <td>{{ $camionero->apellido." ".$camionero->nombre }}</td>
                    <td>{{ $camionero->direccion }}</td>
                    <td>{{ $camionero->telefono }}</td>
                    <td>
                        <form action="{{ route('camioneros.destroy',$camionero->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('camioneros.edit',$camionero->id) }}"><i class="fa fa-edit"></i> Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $camioneros->links() !!}

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