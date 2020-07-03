@extends('layouts.app')

@section('content')
  <form action="{{ route('sueldos.create')}}" method="post">
  @csrf
    <label for="">Seleccione camionero:</label>
    <select name="camionero" id="camionero">
      @foreach ($camioneros as $camionero)
        <option value='{{$camionero->id}}'>
        {{$camionero->apellido.' '.$camionero->nombre}}
        </option>
      @endforeach
    </select>
    <button type="submit">Buscar</button>
  </form>


  <div class="table-responsive mt-3">
    <table>
      <tr>
        <!-- th -->
      </tr>
      <tr>
        <!-- td -->
      </tr>
    </table>
  </div>
@endsection