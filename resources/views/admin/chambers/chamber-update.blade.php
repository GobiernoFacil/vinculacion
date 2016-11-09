@extends('layouts.master-admin')
@section('title', 'Editar Cámara')
@section('description', 'Editar Cámara en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'chambers')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'chamber-update')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<!-- Formulario de cámara -->
		<h1>Editar Cámara</h1>
	</div>
    <div class="col-sm-6 col-sm-offset-3">	
		{!! Form::model($chamber, ['url' => "dashboard/camara/editar/{$chamber->id}", "class" => "form-horizontal"]) !!}

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
			  {{Form::text('email', null, ["class" => "form-control"])}}
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
			    <label>nombre comercial</label>
			    {{Form::text('chamber_comercial_name', $chamber->chamber->chamber_comercial_name, ["class" => "form-control"])}}
			    @if($errors->has('chamber_comercial_name'))
			      <strong>{{$errors->first('chamber_comercial_name')}}</strong>
			    @endif
			  </p>
			  <p>
			  <label>RFC</label>
			  {{Form::text('chamber_rfc', $chamber->chamber->chamber_rfc, ["class" => "form-control"])}}
			  @if($errors->has('chamber_rfc'))
			    <strong>{{$errors->first('chamber_rfc')}}</strong>
			  @endif
			</p>
			</fieldset>
			
			<p>{{Form::submit('Actualizar',["class" => "btn"])}}</p>
			
		<!-- se cierra el form -->
		{!! Form::close() !!}
	</div>
</div>
@endsection
