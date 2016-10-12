@extends('layouts.master-admin')
@section('title', 'Actualizar empresas vía Excel')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd empresas')
<?php /*
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'empresas')
*/ ?>
@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1>Agregar Empresas</h1>
  </div>

  {!! Form::open(['url' => 'tablero-opd/empresas/actualizar/xlsx', 'files' => true]) !!}
  <p>Agregar varias empresas a través de un archivo excel</p>
    {!! csrf_field() !!}
    <p>
    {{Form::file('file')}} <br>
    (El archivo debe ser excel menor a 2mb)
    </p>
    @if($errors->has('file'))
      <strong>{{$errors->first('file')}}</strong>
    @endif

    <p><input type="submit" name="Enviar" class ="btn"></p>
  {!! Form::close() !!}

</div>
@endsection
