@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Acoplado</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('acoplados.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('acoplados.update',$acoplado->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CODIGO: {{$acoplado->id_simple_acoplado}}</strong>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Patente:</strong>
                <input value={{$acoplado->patente}} type="text" max=10 name="patente" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento VTV:</strong>
                <input value="{{$acoplado->vtv_vencimiento}}" min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="vtv_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento SENASA:</strong>
                <input value="{{$acoplado->senasa_vencimiento}}" min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="senasa_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vencimiento Seguro:</strong>
                <input value="{{$acoplado->seguro_vencimiento}}" min="2020-01-01" max="2040-12-31" type="date" class="form-control" name="seguro_vencimiento" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
    </form>
@endsection