@extends('layouts.master-admin')
@section('title', 'Actualizar estudiantes vía Excel')
@section('description', 'Lista de Estudiantes del Gobierno del Estado de Puebla')
@section('bodyclass', 'opd estudiantes')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_o', 'estudiantes xls')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1>Agregar Estudiantes</h1>
  </div>
  <div class="col-sm-10 col-sm-offset-1">

  {!! Form::open(['url' => 'tablero-opd/estudiantes/actualizar/xlsx', 'files' => true]) !!}
 	<h3>Puedes agregar varios estudiantes a través de un archivo excel</h3>
    {!! csrf_field() !!}
    <p class="lead">
    {{Form::file('file')}} <br>
    (El archivo debe ser excel menor a 2mb)
    </p>
    @if($errors->has('file'))
      <strong>{{$errors->first('file')}}</strong>
    @endif

    <p><input type="submit" name="Enviar" class ="btn" value="Agregar archivo"></p>
  {!! Form::close() !!}
  </div>
</div>
@endsection
