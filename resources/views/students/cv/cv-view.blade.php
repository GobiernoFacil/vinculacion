@extends('layouts.master-admin')
@section('title', 'Ver CV')
@section('description', 'Ver currículo en plataforma de Gobierno del Estado de Puebla')
@section('bodyclass', 'student cv')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'cv')

@section('content')
<!-- Perfil -->
<div class="row">
	@if(Session::has('message'))
		<div class="col-sm-12 message success">
				{{ Session::get('message') }}
		</div>
@endif
	<div class="col-sm-12">
		@if(!$user->enabled)
			@include('students.alert-message')
		@endif
		<h1>Currículum vitae</h1>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<h2>{{$user->name}}</h2>
		<p>{{$cv->city}} , {{$cv->state}}</p>
		<p>{{$cv->email}}</p>
		<p>{{$cv->phone}}</p>
		<p>Creado: {{date('d-m-Y', strtotime($cv->created_at))}}</p>
		<p>Actualizado: {{date('d-m-Y', strtotime($cv->updated_at))}}</p>
	</div>
	<div class="col-sm-3 col-sm-offset-2">
		<p><a href="{{url("tablero-estudiante/cv/editar")}}" class="btn">Editar</a></p>
	</div>
</div>
@endsection
