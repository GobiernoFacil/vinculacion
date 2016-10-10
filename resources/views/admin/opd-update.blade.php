@extends('layouts.master-admin')
@section('content')
<div class="container">
<!-- Formulario de opd -->
<h4>Editar Universidad</h4>

{!! Form::model($opd->opd, ['url' => "dashboard/opd/editar/{$opd->id}", "class" => "form-horizontal"]) !!}

<!-- cosas del user -->
<fieldset>
<h5>Datos de usuario</h5>
<p>
  <label>nombre</label>
  {{Form::text('name', $opd->name)}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>correo</label>
  {{Form::text('email', $opd->email)}}
  @if($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
  @endif
</p>

<p>
  <label>password</label>
  {{Form::password('password')}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>
</fieldset>

<!-- cosas de su objeto -->
<fieldset>
<h5>Datos de la universidad</h5>
  <p>
    <label>universidad</label>
    {{Form::text('opd_name')}}
    @if($errors->has('opd_name'))
      <strong>{{$errors->first('opd_name')}}</strong>
    @endif
  </p>

  <p>
    <label>estado</label>
    {{Form::text('state')}}
    @if($errors->has('state'))
      <strong>{{$errors->first('state')}}</strong>
    @endif
  </p>

  <p>
    <label>municipio</label>
    {{Form::text('city')}}
    @if($errors->has('city'))
      <strong>{{$errors->first('city')}}</strong>
    @endif
  </p>

  <p>
    <label>dirección</label>
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
    <label>url</label>
    {{Form::text('url')}}
    @if($errors->has('url'))
      <strong>{{$errors->first('url')}}</strong>
    @endif
  </p>
</fieldset>

<!-- cosas del contacto -->
<fieldset>
<h5>Datos del contacto</h5>
  <p>
    <label>nombre</label>
    {{Form::text('cname', $opd->opd->contact->name)}}
    @if($errors->has('cname'))
      <strong>{{$errors->first('cname')}}</strong>
    @endif
  </p>
  <p>
    <label>teléfono</label>
    {{Form::text('cphone', $opd->opd->contact->phone)}}
    @if($errors->has('cphone'))
      <strong>{{$errors->first('cphone')}}</strong>
    @endif
  </p>

  <p>
    <label>correo</label>
    {{Form::text('cemail', $opd->opd->contact->email)}}
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
