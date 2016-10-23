@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student vacantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'vacantes')

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

    @if($user->enabled)
      @if($applied)
      <p><a href="{{url("tablero-estudiante/vacante/declinar/{$vacancy->id}")}}">Declinar aplicación</a></p>
      @else
      <p><a href="{{url("tablero-estudiante/vacante/aplicar/{$vacancy->id}")}}">Aplicar</a></p>
      @endif
    @else
    <p>para poder aplicar a la vacante, debe habilitarte tu universidad.</p>
    <p>
      Esta es la información: <br>
      contacto : {{$user->student->opd->contact->name}}<br>
      teléfono : {{$user->student->opd->contact->phone}}<br>
      correo   : {{$user->student->opd->contact->email}}
    </p>
    @endif

  </div>
</section>
@endsection
