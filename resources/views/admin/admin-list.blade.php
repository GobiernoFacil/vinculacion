@extends('layouts.master-admin')
@section('title', 'Dashboard Empleo Abierto')
@section('description', 'Dashboard Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'users')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'user')

@section('content')
<!-- Admins -->
<div class="col-sm-12">
	<h1>Usuarios Administradores</h1>
@if($admins->count())
  <ul>
  @foreach($admins as $admin)
    <li><a href="{{url("dashboard/administrador/{$admin->id}")}}"> {{$admin->name}}</a></li>
  @endforeach
  </ul>

@else
  <p>Eres el único administrador</p>
@endif

<p><a href="{{url("dashboard/administrador/crear")}}">Crear administrador</a></p>
{{ $admins->links() }}
</div>
@endsection