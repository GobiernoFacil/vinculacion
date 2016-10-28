@extends('layouts.master-admin')
@section('title', 'Lista de Convenios')
@section('description', 'Lista de Convenios por Universidad del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds contratos')

@section('content')
<div class ="row">
<div class="col-sm-12">
	<h1>Convenios</h1>
</div>
<p>
	<div class="col-sm-3 col-sm-offset-9">
		<p><a href="{{url("dashboard/contrato/crear/{$opd_id}")}}" class="btn add"> + Agregar convenio</a></p>
	</div>

</p>

<div class="col-sm-12">

  @if(Session::has('message'))
    <div class="col-sm-12 message success">
        {{ Session::get('message') }}
    </div>
@endif
@if($contracts->count())
	<ul class="list">
		<li class="row titles">
				<span class="col-sm-2">Nombre</span>
				<span class="col-sm-3">Objetivo</span>
				<span class="col-sm-2">Descripción</span>
				<span class="col-sm-2">Responsable</span>
				<span class="col-sm-2">Acciones</span>
		</li>
	@foreach($contracts as $contract)
		<li class="row">
		<span class="col-sm-2"><a href="{{url("dashboard/contrato/ver/{$opd_id}/{$contract->id}")}}">
			{{$contract->contract_name}}
			</a><br>
			<span class="note">Actualizado: {{date('d-m-Y', strtotime($contract->updated_at))}}</span>
		</span>
		<span class="col-sm-3">{{$contract->contract_objective}}</span>
		<span class="col-sm-2">{{$contract->contract_description}}</span>
		<span class="col-sm-2">{{$contract->contract_responsable_name}}<br>
			<span class="note">Correo: {{$contract->contract_responsable_email}}</span>
		</span>
		<span class="col-sm-2">
			<a href="{{url("dashboard/contrato/editar/{$opd_id}/{$contract->id}")}}" class="btn xs">Editar</a>
			<a href="{{url("dashboard/contrato/eliminar/{$opd_id}/{$contract->id}")}}" class="btn danger xs" onclick = "return confirm('¿Estás seguro?')">Eliminar</a>
		</span>

		</li>
	@endforeach
	</ul>

@else
	<p>No hay convenios registrados</p>
@endif


{{ $contracts->links() }}
</div>
</div>
@endsection
