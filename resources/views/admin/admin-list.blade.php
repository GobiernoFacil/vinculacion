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
		<p><a href="{{url("dashboard/administrador/crear")}}" class="btn"> + Crear administrador</a></p>
	</div>
	<div class="col-sm-12">
		@if($admins->count())
		  <ul class="list">
			  <li class="row titles">
			  		<span class="col-sm-4">Nombre</span>
			  		<span class="col-sm-4">Email</span>
			  		<span class="col-sm-2">Estado</span>
			  		<span class="col-sm-2">Creado</span>
			  </li>
			  
		  @foreach($admins as $admin)
				<li class="row">
					<span class="col-sm-4"><a href="{{url("dashboard/administrador/{$admin->id}")}}"> {{$admin->name}}</a></span>
					<span class="col-sm-4">{{$admin->email}}</span>
					<span class="col-sm-2">{{$admin->enabled == 0 ? "Habilitado" : "Deshabilitado"}}</span>
					<span class="col-sm-2">{{date('d-m-Y', strtotime($admin->created_at))}}</span>
				</li>
		  @endforeach
		  </ul>
		
		@else
		  <p>Eres el único administrador</p>
		@endif

		{{ $admins->links() }}
	</div>
</div>
@endsection