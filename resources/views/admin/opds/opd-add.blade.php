@extends('layouts.master-admin')
@section('title', 'Agregar Universidad')
@section('description', 'Agregar Universidad del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd-add')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-sm-12">
      <!-- Formulario de opd -->
      <h1 class="separator">Agregar Universidad</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model("", ['url' => "dashboard/opd/crear", "class" => "form-horizontal", 'files'=>true]) !!}

      <!-- cosas del user -->
      <fieldset>
        <h5>Datos de usuario</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('name', null,["class" => "form-control"])}}
          @if($errors->has('name'))
          <strong>{{$errors->first('name')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('email', null,["class" => "form-control"])}}
          @if($errors->has('email'))
          <strong>{{$errors->first('email')}}</strong>
          @endif
        </p>

        <p>
          <label>Password</label>
          {{Form::password('password',["class" => "form-control"])}}
          @if($errors->has('password'))
          <strong>{{$errors->first('password')}}</strong>
          @endif
        </p>
      </fieldset>

      <!-- cosas de su objeto -->
      <fieldset>
        <h5>Datos de la universidad</h5>
        <p>
          <label>Universidad</label>
          {{Form::text('opd_name', null,["class" => "form-control"])}}
          @if($errors->has('opd_name'))
          <strong>{{$errors->first('opd_name')}}</strong>
          @endif
        </p>

        <p>
          <label>Estado</label>
          {{Form::text('state', null,["class" => "form-control"])}}
          @if($errors->has('state'))
          <strong>{{$errors->first('state')}}</strong>
          @endif
        </p>

        <p>
          <label>Municipio</label>
          {{Form::text('city', null,["class" => "form-control"])}}
          @if($errors->has('city'))
          <strong>{{$errors->first('city')}}</strong>
          @endif
        </p>

        <p>
          <label>Dirección</label>
          {{Form::text('address', null,["class" => "form-control"])}}
          @if($errors->has('address'))
          <strong>{{$errors->first('address')}}</strong>
          @endif
        </p>

        <p>
          <label>C.P.</label>
          {{Form::text('zip', null,["class" => "form-control"])}}
          @if($errors->has('zip'))
          <strong>{{$errors->first('zip')}}</strong>
          @endif
        </p>

        <p>
          <label>Url</label>
          {{Form::text('url', null,["class" => "form-control"])}}
          @if($errors->has('url'))
          <strong>{{$errors->first('url')}}</strong>
          @endif
        </p>
      </fieldset>

      <!-- cosas del contacto -->
      <fieldset>
        <h5>Datos del contacto</h5>
        <p>
          <label>Nombre</label>
          {{Form::text('cname', null, ['class' => 'form-control'])}}
          @if($errors->has('cname'))
          <strong>{{$errors->first('cname')}}</strong>
          @endif
        </p>
        <p>
          <label>Teléfono</label>
          {{Form::text('cphone', null, ['class' => 'form-control'])}}
          @if($errors->has('cphone'))
          <strong>{{$errors->first('cphone')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('cemail', null, ['class' => 'form-control'])}}
          @if($errors->has('cemail'))
          <strong>{{$errors->first('cemail')}}</strong>
          @endif
        </p>
      </fieldset>
      <!-- logo -->
      <fieldset>
        <h5>Logo</h5>
        <p>
        {{Form::file('logo', ['class' => ''])}}
      </p>
      </fieldset>

      <p>{{Form::submit('Crear',["class" => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}

    </div>
    @endsection
