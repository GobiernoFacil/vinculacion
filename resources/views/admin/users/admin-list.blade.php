@extends('layouts.master-admin')
@section('title', 'Administradores Empleo Abierto')
@section('description', 'Administradores Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'users')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'user')

@section('content')
<div class="row">
	<!-- Admins -->
	<div class="col-sm-12">
		<h1>Usuarios Administradores</h1>
	</div>
	<div class="col-sm-3 col-sm-offset-9">
		<p><a href="{{url("dashboard/administrador/crear")}}" class="btn add"> + Crear administrador</a></p>
	</div>
	<div class="col-sm-12">
		@if(Session::has('message'))
	    <div class="col-sm-12 message success">
	        {{ Session::get('message') }}
	    </div>
	@endif
		@if($admins->count())
		<ul class="list">
			<li class="row titles">
				<span class="col-sm-4">Nombre</span>
				<span class="col-sm-4">Email</span>
				<span class="col-sm-2">Estado</span>
				<span class="col-sm-2">Acciones</span>
			</li>

			@foreach($admins as $admin)
			<li class="row">
				<span class="col-sm-4"><a href="{{url("dashboard/administrador/{$admin->id}")}}" class="link_view"> {{$admin->name}}</a><br>
					<span class="note">Creado: {{date('d-m-Y', strtotime($admin->created_at))}}</span>
				</span>
				<span class="col-sm-4">{{$admin->email}}</span>
				<span class="col-sm-2">{!! $admin->enabled == 0 ? '<span class="disabled">Deshabilitado</span>' : '<span class="enabled">Habilitado</span>' !!}
			</span>
			<span class="col-sm-2">
				<a href="{{url("dashboard/administrador/editar/{$admin->id}")}}" class="btn xs">Editar</a>
				<a href="{{url("dashboard/administrador/eliminar/{$admin->id}")}}" class="btn danger xs" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
			</span>
		</li>
		@endforeach
	</ul>

	@else
	<p>{{$user->type ==="superAdmin" ? 'No hay administradores' : 'Eres el único administrador'}}</p>
	@endif

	{{ $admins->links() }}
</div>
</div>
@endsection
