@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 margin-tb">
            <h2>Acoplados.</h2>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success float-right" href="{{ route('acoplados.create') }}"> Nuevo Acoplado</a>
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


    @if($acoplados->isEmpty())
    <div class="text-center">
        <img style="max-height: 50vh" src="img/noResults.png" alt="Sin resultados">
        <p>No se encontraron resultados.</p>
    </div>                                      
    @else

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <tr class="">
                <th>CODIGO</th>
                <th>Patente</th>
                <th>Venc VTV</th>
                <th>Venc SENASA</th>
                <th>Venc Seguro</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($acoplados as $acoplado)
                <tr>
                    <td>{{ $acoplado->id_simple_acoplado }}</td>
                    <td>{{ $acoplado->patente }}</td>
                    <td>{{ $acoplado->vtv_vencimiento }}</td>
                    <td>{{ $acoplado->senasa_vencimiento }}</td>
                    <td>{{ $acoplado->seguro_vencimiento }}</td>
                    <td>
                        <form action="{{ route('acoplados.destroy',$acoplado->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('acoplados.edit',$acoplado->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $acoplados->links() !!}

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