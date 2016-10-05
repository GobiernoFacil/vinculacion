@extends('layouts.master-admin')
@section('title', 'Editar Administrador')
@section('description', 'Administradores Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'users')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'user-update')


@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
<!-- Formulario de perfil -->
<h2>Editar Administrador</h2>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	{!! Form::model($admin, ['url' => "dashboard/administrador/editar/{$admin->id}", "class" => "form-horizontal"]) !!}
	
	<p>
	  <label>Nombre</label>
	  {{Form::text('name', null, ["class" => "form-control"])}}
	  @if($errors->has('name'))
	    <strong>{{$errors->first('name')}}</strong>
	  @endif
	</p>
	
	<p>
	  <label>Correo</label>
	  {{Form::text('email', null, ["class" => "form-control"])}}
	  @if($errors->has('email'))
	    <strong>{{$errors->first('email')}}</strong>
	  @endif
	</p>
	
	<p>
	  <label>Contraseña</label>
	  {{Form::password('password', ['class' => 'form-control'])}}
	  @if($errors->has('password'))
	    <strong>{{$errors->first('password')}}</strong>
	  @endif
	</p>
	
	<p>{{Form::submit('Actualizar', ['class' => 'btn'])}}</p>
	
	<!-- se cierra el form -->
	{!! Form::close() !!}
	</div>

</div>
@endsection