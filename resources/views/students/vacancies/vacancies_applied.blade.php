@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'vacantes aplicadas')

@section('content')
<div class="row">
  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
    <div class="col-sm-12">
        @if(!$user->enabled)
         @include('companies.alert-message')
        @endif
        <h1>Vacantes Aplicadas: {{$applications->count()}} </h1>
    </div>
    <div class="col-sm-3">
    	<a href="{{ url('tablero-estudiante/vacantes') }}" class="btn">&lt; Ver todas las vacantes</a>
    </div>
    <div class="col-sm-12">
      @if($applications->count())
      <ul class="list">
        <li class="clearfix titles">
          <span class="col-sm-4 col-xs-4">Vacante</span>
          <span class="col-sm-2 col-xs-4">Sueldo</span>
          <span class="col-sm-2 col-xs-4">Empresa</span>
          <span class="col-sm-2 nomobile">Ubicación</span>
          <span class="col-sm-2 nomobile">Acciones</span>
        </li>
        @foreach($applications as $application)
        <li class="clearfix">
          <span class="col-sm-4 col-xs-4">
          	<a href="{{url("tablero-estudiante/vacante/{$application->vacant_id}")}}">{{$application->vacancy->job}}</a>
          	<br>
          	<span class="note">Carrera: {{$application->tags}}</span>
          </span>
          <span class="col-sm-2 col-xs-4">{{$application->salary ? '$' .  number_format($application->salary,2, '.', ',') : ''}}</span>
          <span class="col-sm-2 col-xs-4">{{$application->company}}</span>
          <span class="col-sm-2 nomobile">{{$application->city}}</span>
          <span class="col-sm-2  col-xs-12 right">
            <a href="{{url("tablero-estudiante/vacante/{$application->vacant_id}")}}" class="btn edit xs">Ver</a>
            @if($user->enabled)
				<a href="{{url("tablero-estudiante/vacante/declinar/{$application->vacant_id}")}}" class="btn xs">Declinar</a>
            @endif
          </span>
        </li>
        @endforeach
      </ul>

      @else
    	<p>No hay vacantes aplicadas.</p>
      @endif

    </div>
</div>
@endsection
