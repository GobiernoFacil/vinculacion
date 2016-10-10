@extends('layouts.master-admin')
@section('title', 'Actualizar perfil - Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('content')
<div class="container">
<!-- Formulario de company -->
<div class="row">
  <div class="col-sm-12">
<h1 class="separator">Editar Perfil</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
{!! Form::model($company->company, ['url' => "tablero-empresa/yo/editar", "class" => "form-horizontal"]) !!}

<!-- cosas del user -->
<fieldset>
<h5>Datos de usuario</h5>
<p>
  <label>Nombre</label>
  {{Form::text('name', $company->name)}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>Correo</label>
  {{Form::text('email', $company->email)}}
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
    {{Form::text('rfc',$company->rfc)}}
    @if($errors->has('rfc'))
      <strong>{{$errors->first('rfc')}}</strong>
    @endif
  </p>

  <p>
    <label>Razón Social</label>
    {{Form::text('razon_social',$company->razon_social)}}
    @if($errors->has('razon_social'))
      <strong>{{$errors->first('razon_social')}}</strong>
    @endif
  </p>

  <p>
    <label>Nombre Comercial</label>
    {{Form::text('nombre_comercial',$company->nombre_comercial)}}
    @if($errors->has('nombre_comercial'))
      <strong>{{$errors->first('nombre_comercial')}}</strong>
    @endif
  </p>

  <p>
    <label>Dirección</label>
    {{Form::text('address',$company->address)}}
    @if($errors->has('address'))
      <strong>{{$errors->first('address')}}</strong>
    @endif
  </p>

  <p>
    <label>C.P.</label>
    {{Form::text('zip',$company->zip)}}
    @if($errors->has('zip'))
      <strong>{{$errors->first('zip')}}</strong>
    @endif
  </p>

  <p>
    <label>Teléfono</label>
    {{Form::text('phone', $company->phone)}}
    @if($errors->has('phone'))
      <strong>{{$errors->first('cphone')}}</strong>
    @endif
  </p>
  <p>
    <label>Giro Comercial</label>
    {{Form::text('giro_comercial', $company->giro_comercial)}}
    @if($errors->has('giro_comercial'))
      <strong>{{$errors->first('giro_comercial')}}</strong>
    @endif
  </p>
  <p>
    <label>Alcance</label>
    {{Form::text('alcance', $company->alcance)}}
    @if($errors->has('alcance'))
      <strong>{{$errors->first('alcance')}}</strong>
    @endif
  </p>
  <p>
    <label>Tamaño</label>
    {{Form::text('size', $company->size)}}
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
    {{Form::text('cname', !empty($company->company->contact->name) ? $company->company->contact->name : "")}}
    @if($errors->has('cname'))
      <strong>{{$errors->first('cname')}}</strong>
    @endif
  </p>
  <p>
    <label>Teléfono</label>
    {{Form::text('cphone', !empty($company->company->contact->phone) ? $company->company->contact->phone : "")}}
    @if($errors->has('cphone'))
      <strong>{{$errors->first('cphone')}}</strong>
    @endif
  </p>

  <p>
    <label>Correo</label>
    {{Form::text('cemail', !empty($company->company->contact->email) ? $company->company->contact->email : "")}}
    @if($errors->has('cemail'))
      <strong>{{$errors->first('cemail')}}</strong>
    @endif
  </p>
</fieldset>

<p>{{Form::submit('Actualizar')}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}

</div>
@endsection
