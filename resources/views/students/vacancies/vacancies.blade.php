@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'vacantes')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(!$user->enabled)
         @include('companies.alert-message')
        @endif
        <h1>Vacantes: {{$vacancies->count()}} </h1>    

      @if($vacancies->count())
      <ul class="list">
        <li class="clearfix titles">
          <span class="col-sm-4 col-xs-4">Vacante</span>
          <span class="col-sm-2 col-xs-4">Sueldo</span>
          <span class="col-sm-2 col-xs-4">Empresa</span>
          <span class="col-sm-2 nomobile">Ubicación</span>
          <span class="col-sm-2 nomobile">Acciones</span>
        </li>
        @foreach($vacancies as $vacancy)
        <li class="clearfix">
          <span class="col-sm-4 col-xs-4">
          	<a href="{{url("tablero-estudiante/vacante/{$vacancy->id}")}}"> {{$vacancy->job}}</a>
          	<br>
          	<span class="note">Carrera: {{$vacancy->tags}}</span>
          </span>
          <span class="col-sm-2 col-xs-4">{{$vacancy->salary ? '$' .  number_format($vacancy->salary,2, '.', ',') : ''}}</span>
          <span class="col-sm-2 col-xs-4">{{$vacancy->company->nombre_comercial}}</span>
          <span class="col-sm-2 nomobile">{{$vacancy->city}}</span>
          <span class="col-sm-2  col-xs-12 right">
            <a href="{{url("tablero-estudiante/vacante/{$vacancy->id}")}}" class="btn edit xs">Ver</a>
            @if($user->enabled)
				<a href="{{url("tablero-estudiante/vacante/aplicar/{$vacancy->id}")}}" class="btn xs">Aplicar</a>
            @endif
          </span>
        </li>
        @endforeach
      </ul>

      @else
    	<p>No hay ninguna vacante publicada</p>
      @endif

    </div>
</div>
@endsection