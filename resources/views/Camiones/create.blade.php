@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('camiones.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo Camión</h2>
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
   
<form action="{{ route('camiones.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" readonly value="CM{{$ultimo}}" max=10 name="idSimple" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Patente:</strong>
                <input type="text" maxlength="7" name="patente" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Vencimiento VTV:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="vtv_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Vencimiento SENASA:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="senasa_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Vencimiento Seguro:</strong>
                <input min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="seguro_vencimiento" placeholder="">
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