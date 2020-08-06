@extends('layouts.app')
@section('title', 'Editar camionero')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('camioneros.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editar Camionero</h2>
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
   
<form action="{{ route('camioneros.update', $camionero->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-sm-12 col-md-4 lg-3">
        <div class="form-group">
            <strong>CODIGO:</strong>
            <input type="text" value="{{$camionero->id_simple_camioneros}}" max=10 name="id_simple" class="form-control" readonly>
        </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-4">
            <div class="form-group">
                <strong>DNI:</strong>
                <input type="text" max=10 name="dni" class="form-control" placeholder="" value="{{$camionero->DNI}}">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="text" class="form-control" name="contraseña" placeholder="">
            </div>
        </div> -->
        <div class="col-sm-12 col-md-4 lg-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" class="form-control" name="nombre" placeholder="" value="{{$camionero->nombre}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-4">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input type="text" class="form-control" name="apellido" placeholder="" value="{{$camionero->apellido}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-6">
            <div class="form-group">
                <strong>Dirección:</strong>
                <input type="text" class="form-control" name="direccion" placeholder="" value="{{$camionero->direccion}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-4 lg-6">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text" class="form-control" name="telefono" placeholder="" value="{{$camionero->telefono}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
    </div>
   
</form>
@endsection