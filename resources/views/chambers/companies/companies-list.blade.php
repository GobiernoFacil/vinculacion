@extends('layouts.master-admin')
@section('title', 'Lista de Empresas')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'chamber empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_c', 'empresas')

@section('content')
<div class="row">
<!-- empresas -->
  <div class="col-sm-12">
    <h1>Empresas</h1>
  </div>
  <p>
    <div class="col-sm-3 col-sm-offset-6">
      <p><a href="{{url("tablero-camara/empresa/crear")}}" class="btn add"> + Agregar empresa</a></p>
    </div>
    <div class="col-sm-3">
      <p><a href="{{url("tablero-camara/empresas/actualizar/xlsx")}}" class="btn add">+ Agregar varias empresas</a></p>
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
    @foreach($companies as $element)
      <li class="row">
      <span class="col-sm-2">{{$element->company->rfc}}</span>
      <span class="col-sm-4"><a href="{{url("tablero-camara/empresa/ver/{$element->company->id}")}}">
        {{$element->company->nombre_comercial}}
        </a><br>
        <span class="note">Actualizado: {{date('d-m-Y', strtotime($element->company->updated_at))}}</span>
      </span>
      <span class="col-sm-2">{{$element->company->address}}</span>
      <span class="col-sm-2">
        <a href="{{url("tablero-camara/empresa/editar/{$element->company->id}")}}" class="btn xs">Editar</a>
        <a href="{{url("tablero-camara/empresa/eliminar/{$element->company->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
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
