@extends('layouts.app')
@section('title', 'Editar cliente')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('clientes.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editar Cliente</h2>
        </div>
    </div>
</div>
<hr>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Parece que tenemos un problema con los datos que ingresaste.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form id="formularioConLoading" action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
     <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" disabled value="{{$cliente->id_simple_clientes}}" max=10 name="codigo" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CUIT:</strong>
                <input type="text" max=10 name="cuil" class="form-control" placeholder="" value="{{$cliente->CUIL}}" pattern="[0-9]{0,12}" title="Solo numeros sin guiones ni espacios" autofocus required>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Razón social:</strong>
                <input type="text" class="form-control" name="nombre" placeholder="" value="{{$cliente->nombre}}" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Dirección:</strong>
                <input type="text" class="form-control" name="direccion" placeholder="" value="{{$cliente->direccion}}" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text"  class="form-control" name="telefono" placeholder="" value="{{$cliente->telefono}}" pattern="[0-9]{0,16}" title="Solo numeros sin guiones ni espacios" required>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Correo:</strong>
                <input type="text" class="form-control" name="correo" placeholder="" value="{{$cliente->correo}}" >
            </div>
        </div>
        <div class="col-sm-12 ">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
   
</form>

<script src="{{ asset('js/utilities.js')}}"></script>


@endsection