@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-primary" href="{{ route('camiones.index') }}">Volver</a>
        </div>
        <div class="col margin-tb">
            <div class="pull-left">
                <h2>Editar Camión</h2>
            </div>
        </div>
    </div>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Tenemos problemas con los datos cargados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  

    <form action="{{ route('camiones.update',$camion->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>CODIGO:</strong>
                    <input type="text" readonly value="{{$camion->id_simple_camiones}}" max=10 name="patente" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 lg-3">
            <div class="form-group">
                <strong>Patente:</strong>
                <input value='{{$camion->patente}}' type="text" max=10 name="patente" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento VTV:</strong>
                <input value='{{$camion->vtv_vencimiento}}' min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="vtv_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento SENASA:</strong>
                <input value='{{$camion->senasa_vencimiento}}' min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="senasa_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento Seguro:</strong>
                <input value='{{$camion->seguro_vencimiento}}' min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="seguro_vencimiento" placeholder="">
            </div>
        </div>
    </form>
@endsection