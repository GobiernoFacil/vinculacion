@extends('layouts.master-admin')
@section('content')
<div class="container">
    <div class="row">
		<div class="col-sm-12">
			<h1>Panel de control</h1>
		</div>
	</div>
</div>


<!-- Admins -->
<h4>Admins</h4>
@if($admins->count())
  <ul>
  @foreach($admins as $admin)
    <li><a href="{{url("dashboard/administrador/{$admin->id}")}}"> {{$admin->name}}</a></li>
  @endforeach
  </ul>
  <p><a href="{{url("dashboard/administradores")}}">Administradores</a></p>
@else
<p>Eres el único administrador</p>
@endif


<!-- Opds -->
<h4>Universidades</h4>
@if($opds->count())
  <ul>
  @foreach($opds as $opd)
    <li>{{$opd->opd->opd_name}}</li>
    <li><a href="{{url("dashboard/opd/{$opd->id}")}}"> {{$opd->name}}</a></li>
  @endforeach
  </ul>
  <p><a href="{{url("dashboard/opds")}}">universidades</a></p>
@else
<p>No hay universidades registradas</p>
@endif


@endsection
