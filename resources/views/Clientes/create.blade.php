@extends('layouts.app')
@section('title', 'Nuevo cliente')

@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('clientes.index') }}"><i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo Cliente</h2>
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

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" readonly  value="CL{{$ultimo}}"  max=10 name="idSimple" class="form-control" >
            </div>
        </div>

        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CUIT:</strong>
                <input type="text" max=10 name="cuil" class="form-control" placeholder="Sin guiones ni espacios">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Razón social:</strong>
                <input type="text" max="30" class="form-control" name="nombre" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Dirección:</strong>
                <input type="text" max="60" class="form-control" name="direccion" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Teléfono:</strong>
                <input type="text" class="form-control" name="telefono" placeholder="2477 123456">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Correo:</strong>
                <input type="email" class="form-control" name="correo" placeholder="correo@dominio.com">
            </div>
        </div>
        <div class="col-sm-12 ">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>

</form>
@endsection