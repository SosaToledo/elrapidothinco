@extends('layouts.app')

@section('content')
    @guest
        @php
            header("Location: www.google.com");
        @endphp
        No estoy funcionando
    @else
        <div class="container">
            <form class="form-horizontal">
            <fieldset>

            <!-- Form Name -->
            <legend>NUEVO VIAJE</legend>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="id_conductor"></label>  
            <div class="col-md-4">
            <input id="id_conductor" name="id_conductor" type="text" placeholder="Conducror" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="origen"></label>  
            <div class="col-md-4">
            <input id="origen" name="origen" type="text" placeholder="Origen" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="destino"></label>  
            <div class="col-md-6">
            <input id="destino" name="destino" type="text" placeholder="Destino" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="unidad"></label>
            <div class="col-md-4">
                <select id="unidad" name="unidad" class="form-control">
                <option value="1">Unidad</option>
                <option value="2">Chasis</option>
                </select>
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="valor"></label>  
            <div class="col-md-4">
            <input id="valor" name="valor" type="text" placeholder="Valor" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="porcentaje_camionero"></label>  
            <div class="col-md-4">
            <input id="porcentaje_camionero" name="porcentaje_camionero" type="text" placeholder="18%" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="guia"></label>  
            <div class="col-md-4">
            <input id="guia" name="guia" type="text" placeholder="Guía " class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="peaje"></label>  
            <div class="col-md-4">
            <input id="peaje" name="peaje" type="text" placeholder="Peaje" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="g_litros"></label>  
            <div class="col-md-4">
            <input id="g_litros" name="g_litros" type="text" placeholder="Litros de gasoil" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="g_total"></label>  
            <div class="col-md-4">
            <input id="g_total" name="g_total" type="text" placeholder="Gasoil total ($)" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="viaticos"></label>  
            <div class="col-md-4">
            <input id="viaticos" name="viaticos" type="text" placeholder="Viaticos" class="form-control input-md" required="">
                
            </div>
            </div>

            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="add"></label>
            <div class="col-md-4">
                <button id="add" name="add" class="btn btn-default">Cargar</button>
            </div>
            </div>

            </fieldset>
            </form>
        </div>
    @endguest
@endsection