@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student')


@section('content')
<section>
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        @if(!$user->enabled)
         @include('companies.alert-message') 
        @endif
        <h1>Vacante</h1>
      </div>
    </div>

    <h3>{{$vacancy->job}}</h3>

    <h4>Carreras</h4>
    <p>{{$vacancy->tags}}</p>


    <h3>Empresa</h3>
    <p>{{$vacancy->company->nombre_comercial}}</p>

    <p><a href="{{url("tablero-estudiante/vacante/aplicar/{$vacancy->id}")}}">Aplicar</a></p>
    
  </div>
</section>
@endsection
