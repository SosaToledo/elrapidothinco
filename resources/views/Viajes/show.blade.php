@extends('layouts.app')
@section('title', 'Detalle de viaje')
  
@section('content')

<div class="row">

    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('viajes.index') }}"><i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Detalle de viaje</h2>
        </div>
    </div>
</div>
<hr>
    <div class="row">
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>CODIGO:</strong>
                <input type="text" disabled value=VC0000 max=10 name="idSimpleViajes" class="form-control" placeholder=""value="{{$viaje->idSimpleViajes}}">
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Camión:</strong>
                <input type="text" maxlength="7" name="camion" class="form-control" placeholder=""value="{{$viaje->id_camiones}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Acoplado:</strong>
                <input type="text" class="form-control" name="acoplado" value="{{$viaje->id_acoplado}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>camionero:</strong>
                <input type="text" class="form-control" name="camionero" value="{{$viaje->id_camionero}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>cliente:</strong>
                <input type="text" class="form-control" name="cliente" value="{{$viaje->id_cliente}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km inicial:</strong>
                <input type="text" class="form-control" name="km_inicial" value="{{$viaje->km_inicial}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Km final:</strong>
                <input type="text" class="form-control" name="km_final" value="{{$viaje->km_final}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Distancia:</strong>
                <input type="text" class="form-control" name="distancia" value="{{$viaje->distancia}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Origen:</strong>
                <input type="text" class="form-control" name="origen" value="{{$viaje->origen}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Destinos:</strong>
                <input type="text" class="form-control" name="destinos" value="{{$viaje->destino}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="text" class="form-control" name="valor" value="{{$viaje->valor}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>18% del camionero:</strong>
                <input type="text" class="form-control" name="ganancia_camionero" value="{{$viaje->ganancia_camionero}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Tipo:</strong>
                <input type="text" class="form-control" name="tipoCamion" value="{{$viaje->tipoCamion}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>fecha:</strong>
                <input type="date" class="form-control" name="fecha" value="{{$viaje->fecha}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Peajes:</strong>
                <input type="text" class="form-control" name="peajes" value="{{$viaje->peajes}}">
            </div>
        </div>        
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (litros):</strong>
                <input type="text" class="form-control" name="gasoil_litros" value="{{$viaje->gasoil_litros}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Gasoil (precio):</strong>
                <input type="text" class="form-control" name="gasoil_precio" value="{{$viaje->gasoil_precio}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Nota de viaje:</strong>
                <input type="text" class="form-control" name="notaViaje" value="{{$viaje->notaViaje}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Guía:</strong>
                <input type="text" class="form-control" name="guia" value="{{$viaje->guia}}">
            </div>
        </div>
    </div>


@endsection

