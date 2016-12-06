@extends('layouts.master-admin')
@section('title', 'Usuarios Secotrade Empleo Abierto')
@section('description', 'Usuarios Secotrade Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'secotrade')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'secotrade')

@section('content')
<div class="row">
	<!-- Admins -->
	<div class="col-sm-12">
		<h1>Usuarios SECOTRADE</h1>
	</div>
	<div class="col-sm-3 col-sm-offset-9">
		<p><a href="{{url("dashboard/secotrade/crear")}}" class="btn add"> + Crear usuario</a></p>
	</div>
	<div class="col-sm-12">
		@if(Session::has('message'))
	    <div class="col-sm-12 message success">
	        {{ Session::get('message') }}
	    </div>
	@endif
		@if($secotrade->count())
		<ul class="list">
			<li class="row titles">
				<span class="col-sm-4">Nombre</span>
				<span class="col-sm-4">Email</span>
				<span class="col-sm-2">Estado</span>
				<span class="col-sm-2">Acciones</span>
			</li>

			@foreach($secotrade as $person)
			<li class="row">
				<span class="col-sm-4"><a href="{{url("dashboard/secotrade/ver/{$person->id}")}}" class="link_view"> {{$person->name}}</a><br>
					<span class="note">Creado: {{date('d-m-Y', strtotime($person->created_at))}}</span>
				</span>
				<span class="col-sm-4">{{$person->email}}</span>
				<span class="col-sm-2">{!! $person->enabled == 0 ? '<span class="disabled">Deshabilitado</span>' : '<span class="enabled">Habilitado</span>' !!}
			</span>
			<span class="col-sm-2">
				<a href="{{url("dashboard/secotrade/editar/{$person->id}")}}" class="btn xs">Editar</a>
				<a href="{{url("dashboard/secotrade/eliminar/{$person->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
			</span>
		</li>
		@endforeach
	</ul>

	@else
	<p>No hay usuarios</p>
	@endif

	{{ $secotrade->links() }}
</div>
</div>
@endsection
