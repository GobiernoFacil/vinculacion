@extends('layouts.master-admin')
@section('title', 'Agregar Cámara')
@section('description', 'Agregar Cámara en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chambers')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'chamber-add')

@section('content')
<!-- Formulario de cámara -->
<div class="row">
	<div class="col-sm-12">
		<h1>Crear Cámara</h1>
	</div>
    <div class="col-sm-6 col-sm-offset-3">
		{!! Form::open(['url' => "dashboard/camara/crear", "class" => "form-horizontal"]) !!}

		<!-- cosas del user -->
		<fieldset>
			<p>
			  <label>Nombre</label>
			  {{Form::text('name', null, ["class" => "form-control"])}}
			  @if($errors->has('name'))
			    <strong>{{$errors->first('name')}}</strong>
			  @endif
			</p>
			
			<p>
			  <label>Correo</label>
			  {{Form::text('email',null, ["class" => "form-control"])}}
			  @if($errors->has('email'))
			    <strong>{{$errors->first('email')}}</strong>
			  @endif
			</p>
			
			<p>
			  <label>Contraseña</label>
			  {{Form::password('password', ["class" => "form-control"])}}
			  @if($errors->has('password'))
			    <strong>{{$errors->first('password')}}</strong>
			  @endif
			</p>
		</fieldset>

		<!-- cosas de su objeto -->
		<fieldset>
			<p>
			  <label>Nombre comercial</label>
			  {{Form::text('chamber_comercial_name',null, ["class" => "form-control"])}}
			  @if($errors->has('chamber_comercial_name'))
			    <strong>{{$errors->first('chamber_comercial_name')}}</strong>
			  @endif
			</p>
			
			<p>
			  <label>RFC</label>
			  {{Form::text('chamber_rfc',null, ["class" => "form-control"])}}
			  @if($errors->has('chamber_rfc'))
			    <strong>{{$errors->first('chamber_rfc')}}</strong>
			  @endif
			</p>
		</fieldset>

		<p>{{Form::submit('Crear',["class" => "btn"])}}</p>

		<!-- se cierra el form -->
		{!! Form::close() !!}
	</div>
</div>
@endsection
