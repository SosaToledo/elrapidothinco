@extends('layouts.app')
   
@section('content')
<div class="row">
    <div class="col-md-2">
        <a class="btn btn-primary" href="{{ route('acoplados.index') }}"> <i class="fa fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="col margin-tb">
        <div class="pull-left">
            <h2>Editar Acoplado</h2>
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
  
    <form action="{{ route('acoplados.update',$acoplado->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>CODIGO:</strong>
                    <input type="text" disabled value="{{$acoplado->id_simple_acoplado}}" max=10 name="patente" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>Patente:</strong>
                    <input type="text" maxlength="7" name="patente" class="form-control" value="{{$acoplado->patente}}">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>Vencimiento VTV:</strong>
                    <input type="date" min="2020-01-01" max="2040-12-31" class="form-control" name="vtv_vencimiento" value="{{$acoplado->vtv_vencimiento}}">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>Vencimiento SENASA:</strong>
                    <input type="date" min="2020-01-01" max="2040-12-31" class="form-control" name="senasa_vencimiento" value="{{$acoplado->senasa_vencimiento}}">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 lg-3">
                <div class="form-group">
                    <strong>Vencimiento Seguro:</strong>
                    <input type="date" min="2020-01-01" max="2040-12-31" class="form-control" name="seguro_vencimiento" value="{{$acoplado->seguro_vencimiento}}" >
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