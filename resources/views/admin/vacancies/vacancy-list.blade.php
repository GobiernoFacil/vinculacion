@extends('layouts.master-admin')
@section('title', 'Lista de Vacantes')
@section('description', 'Lista de Vacantes en la plataforma del Gobierno del Estado de Puebla')
@section('bodyclass', 'vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'vacantes')

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
    <p><a href="{{url('dashboard/vacante/crear')}}" class="btn add"> + Crear vacante</a></p>
  </div>
  <div class="col-sm-12">
    <div>
      @if($vacancies->count())
      <ul class="list">
        <li class="clearfix titles">

          <span class="col-sm-3 col-xs-4">Vacante</span>
          <span class="col-sm-3 col-xs-4">Empresa</span>
          <span class="col-sm-1 col-xs-1">Aplicaron</span>
          <span class="col-sm-1 nomobile">Entrevistas</span>
          <span class="col-sm-3 nomobile">Acciones</span>
        </li>
        @foreach($vacancies as $vacancy)
        <li class="clearfix">

          <span class="col-sm-3 col-xs-5">
          	<a href="{{url("dashboard/vacante/{$vacancy->id}")}}" class="link_view"> {{$vacancy->job}}</a>
          	<br>
          	<span class="note">Carrera: {{$vacancy->tags}}</span><br>
          	<span class="note {{$vacancy->status == 1 ? 'ena' : 'disa' }}">{{$vacancy->status == 1 ? "Publicado" : "Sin Publicar" }}</span>
          </span>
          <span class="col-sm-3 col-xs-5">
            {{$vacancy->company['nombre_comercial']}}
            <br>
            <span class="note">Correo: {{$vacancy->company['email']}}</span><br>
            <span class="note">{{$vacancy->company['phone']}}</span>
          </span>
          <span class="col-sm-1 col-xs-2">{!! $vacancy->applicants()->count() > 0 ? '<a href="'. url('tablero-empresa/vacante/'. $vacancy->id). '#applicants">' . $vacancy->applicants()->count(). '</a>' : $vacancy->applicants()->count() !!}</span>
          <span class="col-sm-1 nomobile">{{$vacancy->interviews()->count()}}</span>
          <span class="col-sm-3 col-xs-12 right">
            <a href="{{url("dashboard/vacante/{$vacancy->id}")}}" class="btn add xs">Ver</a>
            <a href="{{url("dashboard/vacante/editar/{$vacancy->id}")}}" class="btn xs">Editar</a>
			@if($user->enabled)
          	<a href="{{url("dashboard/vacante/habilitar/{$vacancy->id}")}}" class="btn add xs">{{$vacancy->status == 1 ? "Ocultar" : "Publicar" }}</a>
            @endif
            <a data-job="{{$vacancy->job}}" href="{{url("dashboard/vacante/eliminar/{$vacancy->id}")}}" class="btn danger xs">
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
