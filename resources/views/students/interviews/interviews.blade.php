@extends('layouts.master-admin')
@section('title', 'Entrevistas')
@section('description', 'Entrevistas en Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student entrevistas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'entrevistas')

@section('content')
<div class="row">
  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
    <div class="col-sm-12">
        @if(!$user->enabled)
         @include('students.alert-message')
        @endif
        <h1>Entrevistas: {{$interviews->count()}} </h1>
    </div>
    <div class="col-sm-12">
      @if($interviews->count())
      <ul class="list">
        <li class="clearfix titles">
          <span class="col-sm-4 col-xs-4">Vacante</span>
          <span class="col-sm-3 col-xs-4">Empresa</span>
          <span class="col-sm-2 col-xs-4">Fecha</span>
          <span class="col-sm-2 nomobile">Ubicación</span>
          <span class="col-sm-1 nomobile">Acciones</span>
        </li>
        @foreach($interviews as $interview)
        <li class="clearfix">
          <span class="col-sm-4 col-xs-4">
          	<a href="{{url("tablero-estudiante/vacante/{$interview->id}")}}"> {{$interview->vacancy}}</a>
          </span>
          <span class="col-sm-2 col-xs-4">{{$interview->company->nombre_comercial}}</span>
          <span class="col-sm-3 col-xs-4">{{$interview->date}}</span>
          <span class="col-sm-2 nomobile">{{$interview->address}}</span>
          <span class="col-sm-1  col-xs-12 right">
            <a href="{{url("tablero-estudiante/entrevista/{$interview->id}")}}" class="btn edit xs">Ver</a>
           
          </span>
        </li>
        @endforeach
      </ul>

      @else
    	<p>No hay entrevistas.</p>
      @endif

    </div>
</div>
@endsection
