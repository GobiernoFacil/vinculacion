@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<div class="row">
  <!-- Vacantes -->
  <div class="col-sm-12">
    @if(!$user->enabled)
    @include('companies.alert-message')
    @endif
    <h1>Vacantes</h1>
  </div>
  <div class="col-sm-2 col-sm-offset-10">
    <p><a href="{{url('tablero-empresa/vacante/crear')}}" class="btn add"> + Crear vacante</a></p>
  </div>
  <div class="col-sm-12">
    <div>
      @if($vacancies->count())
      <ul class="list">
        <li class="row titles">
          <span class="col-sm-3">Vacante</span>
          <span class="col-sm-2">Creada</span>
          <span class="col-sm-2">Actualizada</span>
          <span class="col-sm-2">Acciones</span>
        </li>
        @foreach($vacancies as $vacancy)
        <li class="row">
          <span class="col-sm-3"><a href="{{url("tablero-empresa/vacante/{$vacancy->id}")}}"> {{$vacancy->job}}</a></span>
          <span class="col-sm-2">{{$vacancy->created_at}}</span>
          <span class="col-sm-2">{{$vacancy->updated_at}}</span>
          <span class="col-sm-2">
            <a href="{{url("tablero-empresa/vacante/editar/{$vacancy->id}")}}" class="btn xs">Editar</a>
            <a href="{{url("tablero-empresa/vacante/eliminar/{$vacancy->id}")}}" class="btn danger xs">Eliminar</a>
          </span>
        </li>
        @endforeach
      </ul>

      @else
      <p>No tienes ninguna vacante publicada</p>
      @endif
    </div>
  </div>
</div>

@endsection
