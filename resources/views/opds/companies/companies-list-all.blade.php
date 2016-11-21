@extends('layouts.master-admin')
@section('title', 'Lista de Empresas en la Plataforma')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'empresas all')

@section('content')
<div class="row">
<!-- empresas -->
  <div class="col-sm-12">
    <h1>Empresas en la plataforma ({{ $companies_num}})</h1>
  </div>
    <div class="col-sm-4">
	    <a href="{{url('tablero-opd/empresas')}}" class="btn">&lt; Ver empresas registradas</a>
    </div>
    <div class="col-sm-8">
    		  <p>Esta lista muestra las empresas en la plataforma, para ver las empresas agregadas por tu universidad da <a href="{{url('tablero-opd/empresas')}}">click aquí</a></p>

    </div>

  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
  <div class="col-sm-12">
  @if($companies->count())
    <ul class="list">
      <li class="row titles">
          <span class="col-sm-2">RFC</span>
          <span class="col-sm-5">Nombre</span>
          <span class="col-sm-4">Dirección</span>
          <span class="col-sm-1">Acciones</span>
      </li>
    @foreach($companies as $company)
      <li class="row">
      <span class="col-sm-2">{{$company->company->rfc}}</span>
      <span class="col-sm-5"><a href="{{url("empresa/{$company->company->id}")}}">
        {{$company->company->nombre_comercial}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($company->company->updated_at))}}</span>
      </span>
      <span class="col-sm-4">{{$company->company->address}}</span>
      <span class="col-sm-1">
        <a href="{{url("empresa/{$company->company->id}")}}" class="btn add xs">Ver</a>
      </span>

      </li>
    @endforeach
    </ul>

  @else
    <p>No hay empresas registrados</p>
  @endif


  {{ $companies->links() }}
  </div>
</div>
@endsection
