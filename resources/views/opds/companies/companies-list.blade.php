@extends('layouts.master-admin')
@section('title', 'Lista de Empresas')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'empresas')

@section('content')
<div class="row">
<!-- empresas -->
  <div class="col-sm-12">
    <h1>Empresas</h1>
  </div>
  <p>
    <div class="col-sm-3 col-sm-offset-6">
      <p><a href="{{url("tablero-opd/empresa/crear")}}" class="btn add"> + Agregar empresa</a></p>
    </div>
    <div class="col-sm-3">
      <p><a href="{{url("tablero-opd/empresas/actualizar/xlsx")}}" class="btn add">+ Agregar varias empresas</a></p>
    </div>

  </p>
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
          <span class="col-sm-4">Nombre</span>
          <span class="col-sm-2">Dirección</span>
          <span class="col-sm-2">Acciones</span>
      </li>
    @foreach($companies as $company)
      <li class="row">
      <span class="col-sm-2">{{$company->rfc}}</span>
      <span class="col-sm-4"><a href="{{url("tablero-opd/empresa/ver/{$company->id}")}}">
        {{$company->nombre_comercial}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</span>
      </span>
      <span class="col-sm-2">{{$company->address}}</span>
      <span class="col-sm-2">
        <a href="{{url("tablero-opd/empresa/editar/{$company->id}")}}" class="btn xs">Editar</a>
        <a href="{{url("tablero-opd/empresa/eliminar/{$company->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
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
