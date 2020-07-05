@extends('layouts.app')
  
@section('content')
<div class="row">

    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('viajes.index') }}">Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo viaje</h2>
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
   
<form action="{{ route('viajes.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" disabled value=VC0000 max=10 name="idSimpleViajes" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="text" maxlength="7" name="camion" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="text" class="form-control" name="acoplado" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>camionero:</strong>
                <input type="text" class="form-control" name="camionero" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>cliente:</strong>
                <input type="text" class="form-control" name="cliente" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="text" class="form-control" name="origen" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" class="form-control" name="destino" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <input type="text" class="form-control" name="tipoCamion" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>fecha:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="fecha" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Peajes:</strong>
                <input type="text" class="form-control" name="peajes" >
            </div>
        </div>        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (litros):</strong>
                <input type="text" class="form-control" name="gasoil_litros" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (precio):</strong>
                <input type="text" class="form-control" name="gasoil_precio" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" >
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" >
            </div>
        </div>
        <div class="col-sm-12 col-md-12 lg-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
        </div>
    </div>
   
</form>
@endsection