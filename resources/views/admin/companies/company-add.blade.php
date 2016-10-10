@extends('layouts.master-admin')
@section('title', 'Crear Empresa')
@section('description', 'Crear nueva empresa')
@section('bodyclass', 'empresas')
@section('content')
<div class="container">
<!-- Formulario de company -->
<h4>Crear Empresa</h4>

{!! Form::model("",['url' => "dashboard/empresa/crear", "class" => "form-horizontal"]) !!}

<!-- cosas del user -->
<fieldset>
<h5>Datos de usuario</h5>
<p>
  <label>Nombre</label>
  {{Form::text('name')}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>Correo</label>
  {{Form::text('email')}}
  @if($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
  @endif
</p>

<p>
  <label>Contraseña</label>
  {{Form::password('password')}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>
</fieldset>

<!-- cosas de su objeto -->
<fieldset>
<h5>Datos de la empresa</h5>
  <p>
    <label>R.F.C.</label>
    {{Form::text('rfc')}}
    @if($errors->has('rfc'))
      <strong>{{$errors->first('rfc')}}</strong>
    @endif
  </p>

  <p>
    <label>Razón Social</label>
    {{Form::text('razon_social')}}
    @if($errors->has('razon_social'))
      <strong>{{$errors->first('razon_social')}}</strong>
    @endif
  </p>

  <p>
    <label>Nombre Comercial</label>
    {{Form::text('nombre_comercial')}}
    @if($errors->has('nombre_comercial'))
      <strong>{{$errors->first('nombre_comercial')}}</strong>
    @endif
  </p>

  <p>
    <label>Dirección</label>
    {{Form::text('address')}}
    @if($errors->has('address'))
      <strong>{{$errors->first('address')}}</strong>
    @endif
  </p>

  <p>
    <label>C.P.</label>
    {{Form::text('zip')}}
    @if($errors->has('zip'))
      <strong>{{$errors->first('zip')}}</strong>
    @endif
  </p>

  <p>
    <label>Teléfono</label>
    {{Form::text('phone')}}
    @if($errors->has('phone'))
      <strong>{{$errors->first('cphone')}}</strong>
    @endif
  </p>
  <p>
    <label>Giro Comercial</label>
    {{Form::text('giro_comercial')}}
    @if($errors->has('giro_comercial'))
      <strong>{{$errors->first('giro_comercial')}}</strong>
    @endif
  </p>
  <p>
    <label>Alcance</label>
    {{Form::text('alcance')}}
    @if($errors->has('alcance'))
      <strong>{{$errors->first('alcance')}}</strong>
    @endif
  </p>
  <p>
    <label>Tamaño</label>
    {{Form::text('size')}}
    @if($errors->has('size'))
      <strong>{{$errors->first('size')}}</strong>
    @endif
  </p>
</fieldset>

<!-- cosas del contacto -->
<fieldset>
<h5>Datos del contacto</h5>
  <p>
    <label>Nombre</label>
    {{Form::text('cname')}}
    @if($errors->has('cname'))
      <strong>{{$errors->first('cname')}}</strong>
    @endif
  </p>
  <p>
    <label>Teléfono</label>
    {{Form::text('cphone')}}
    @if($errors->has('cphone'))
      <strong>{{$errors->first('cphone')}}</strong>
    @endif
  </p>

  <p>
    <label>Correo</label>
    {{Form::text('cemail')}}
    @if($errors->has('cemail'))
      <strong>{{$errors->first('cemail')}}</strong>
    @endif
  </p>
</fieldset>

<p>{{Form::submit('Crear')}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}

</div>
@endsection
