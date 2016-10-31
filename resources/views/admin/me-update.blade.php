@extends('layouts.master-admin')
@section('title', 'Editar mi perfil')
@section('description', 'Editar mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'me-update')

@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
<!-- Formulario de perfil -->
<h2>Editar mi perfil</h2>

<!--
     El form se pega a un objeto, y así se llenan automáticamente los inputs
     Form::model($user, ['url' => 'dashboard/yo/editar'])

     La guía de este chisme está aquí:
     https://laravelcollective.com/docs/5.2/html

     La validación de esta maroma está aquí:
     App\Http\Requests\UpdateAdminRequest
     Esto remueve toda lógica de validación en el controller
-->
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
{!! Form::model($user, ['url' => 'dashboard/yo/editar', "class" => "form-horizontal"]) !!}
<p>
  <label>Nombre</label>
  {{Form::text('name', null, ["class" => "form-control"])}}
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
  <label>Contraseña</label>
  {{Form::password('password', ['class' => "form-control"])}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>

<p>{{Form::submit('Actualizar', ['class' => "btn"])}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}
</div>

</div>
@endsection
