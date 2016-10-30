@extends('layouts.master-admin')
@section('title', 'Vacantes en la plataforma Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'vacantes')

@section('content')
<div class="row">
  <!-- Vacantes -->
  <div class="col-sm-12">
    @if(!$user->enabled)
    @include('companies.alert-message')
    @endif
    @if(Session::has('message'))
      <div class="col-sm-12 message success">
          {{ Session::get('message') }}
      </div>
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
        <li class="clearfix titles">
          <span class="col-sm-4 col-xs-5">Vacante</span>
          <span class="col-sm-2 col-xs-4">Sueldo</span>
          <span class="col-sm-2 col-xs-3">Aplicaron</span>
          <span class="col-sm-2 nomobile">Entrevistas</span>
          <span class="col-sm-2 nomobile">Acciones</span>
        </li>
        @foreach($vacancies as $vacancy)
        <li class="clearfix">
          <span class="col-sm-4 col-xs-5">
          	<a href="{{url("tablero-empresa/vacante/{$vacancy->id}")}}" class="link_view"> {{$vacancy->job}}</a>
          	<br>
          	<span class="note">Carrera: {{$vacancy->tags}}</span><br>
          	<span class="note {{$vacancy->status == 1 ? 'ena' : 'disa' }}">{{$vacancy->status == 1 ? "Publicado" : "Sin Publicar" }}</span>
          </span>
          <span class="col-sm-2 col-xs-4">{{$vacancy->salary ? '$' .  number_format($vacancy->salary,2, '.', ',') : ''}}</span>
          <span class="col-sm-2 col-xs-3">{!! $vacancy->applicants()->count() > 0 ? '<a href="'. url('tablero-empresa/vacante/'. $vacancy->id). '#applicants">' . $vacancy->applicants()->count(). '</a>' : $vacancy->applicants()->count() !!}</span>
          <span class="col-sm-2 nomobile">0</span>
          <span class="col-sm-2 col-xs-12 right">
            <a href="{{url("tablero-empresa/vacante/{$vacancy->id}")}}" class="btn add xs">Ver</a>
            <a href="{{url("tablero-empresa/vacante/editar/{$vacancy->id}")}}" class="btn xs">Editar</a>
			@if($user->enabled)
          	<a href="{{url("tablero-empresa/vacante/habilitar/{$vacancy->id}")}}" class="btn add xs">{{$vacancy->status == 1 ? "Ocultar" : "Publicar" }}</a>
            @endif            
            <a data-job="{{$vacancy->job}}" href="{{url("tablero-empresa/vacante/eliminar/{$vacancy->id}")}}" class="btn danger xs">
              Eliminar
            </a>
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

<script>
  var dButtons = document.querySelectorAll(".danger");

  if(dButtons.length){
    for(var i =0; i < dButtons.length; i++){
      dButtons[i].addEventListener("click", function(e){
        var d = confirm("¿Deseas eliminar la vacante: " + this.getAttribute("data-job"));
        if(!d){
          e.preventDefault();
        }
      });
    }
  }
</script>
@endsection
