@extends('layouts.master-admin')
@section('title', 'Convenios con Universidades en la plataforma Empleo Abierto')
@section('description', 'Convenios en la plataforma Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company convenios')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'convenios')

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
    <h1>Convenios</h1>
  </div>
  <div class="col-sm-12">
	  @if($company->contracts->count() > 0)
	  @else
	  <p>No tienes convenios con universidades.</p>
	  @endif

	</div>
</div>
@endsection
