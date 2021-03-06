@extends('layouts.master-admin')
@section('title', 'Vacantes en la plataforma Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'puebla vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_p', 'vacantes')

@section('content')
<div class="row">
  <!-- Vacantes -->
  <div class="col-sm-12">
    <h1>Vacantes</h1>
  </div>
  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
  <div class="col-sm-2 col-sm-offset-10">
    <p><a href="{{url('tablero-secotrade/vacante/crear')}}" class="btn add"> + Crear vacante</a></p>
  </div>
  <div class="col-sm-12">
    <div>
      @if($vacancies->count())
      <ul class="list">
        <li class="row titles">
          <span class="col-sm-4">Vacante</span>
          <span class="col-sm-2">Sueldo</span>
          <span class="col-sm-2">Aplicaron</span>
          <span class="col-sm-2">Entrevistas</span>
          <span class="col-sm-2">Acciones</span>
        </li>
        @foreach($vacancies as $vacancy)
        <li class="row">
          <span class="col-sm-4">
            <a href="{{url("tablero-secotrade/vacante/{$vacancy->id}")}}"> {{$vacancy->job}}</a>
            <br>
            <span class="note">Carrera: {{$vacancy->tags}}</span>
          </span>
          <span class="col-sm-2">{{$vacancy->salary ? '$' .  number_format($vacancy->salary,2, '.', ',') : ''}}</span>
          <span class="col-sm-2">{{$vacancy->applicants()->count()}}</span>
          <span class="col-sm-2">0</span>
          <span class="col-sm-2">
            <a href="{{url("tablero-secotrade/vacante/editar/{$vacancy->id}")}}" class="btn xs">Editar</a>
            <a data-job="{{$vacancy->job}}" href="{{url("tablero-secotrade/vacante/eliminar/{$vacancy->id}")}}" class="btn danger xs">
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
        var d = confirm("deseas eliminar la vacante " + this.getAttribute("data-job"));
        if(!d){
          e.preventDefault();
        }
      });
    }
  }
</script>
@endsection
