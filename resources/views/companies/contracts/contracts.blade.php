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
    <ul class="list">
      <li class="row titles">
          <span class="col-sm-2">Nombre</span>
          <span class="col-sm-3">Objetivo</span>
          <span class="col-sm-2">Descripción</span>
          <span class="col-sm-2">Responsable</span>
          <span class="col-sm-2">Acciones</span>
      </li>
    @foreach($company->contracts as $contract)
      <li class="row">
      <span class="col-sm-2"><a href="{{url("tablero-opd/convenio/ver/{$contract->id}")}}">
        {{$contract->contract_name}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($contract->updated_at))}}</span>
      </span>
      <span class="col-sm-3">{{$contract->contract_objective}}</span>
      <span class="col-sm-2">{{$contract->contract_description}}</span>
      <span class="col-sm-2">{{$contract->contract_responsable_name}}<br>
        <span class="note">Correo: {{$contract->contract_responsable_email}}</span>
      </span>
      <span class="col-sm-2">
        <a href="{{url("tablero-empresa/convenio/ver/{$contract->id}")}}" class="btn xs">Ver</a>
      </span>

      </li>
    @endforeach
    </ul>
	  @else
	  <p>No tienes convenios con universidades.</p>
	  @endif

	</div>
</div>
@endsection
