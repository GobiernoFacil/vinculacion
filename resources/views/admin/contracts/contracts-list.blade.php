@extends('layouts.master-admin')
@section('title', 'Lista de Convenios')
@section('description', 'Lista de Convenios por Universidad del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds contratos all')

@section('content')
<div class ="row">
<div class="col-sm-12">
	<h1>Convenios en la Plataforma ({{$contracts->count()}})</h1>
</div>


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
				<span class="col-sm-3">Universidad</span>
				<span class="col-sm-2">Empresa</span>
				<span class="col-sm-2">Responsable</span>
				<span class="col-sm-2">Acciones</span>
		</li>
	@foreach($contracts as $contract)
		<li class="row">
		<span class="col-sm-2"><a href="{{url("dashboard/convenio/ver/{$contract->opd->id}/{$contract->id}")}}">
			{{$contract->contract_name}}
			</a><br>
			<span class="note">Actualizado: {{date('d-m-Y', strtotime($contract->updated_at))}}</span>
		</span>
		<span class="col-sm-3"><a href="{{ url('dashboard/opd/' . $contract->opd->id) }}" class="link_view">{{$contract->contract_opd}}</a></span>
		<span class="col-sm-2"><a href="{{ url('dashboard/empresa/' . $contract->company->id) }}" class="link_view">{{$contract->company->nombre_comercial}}</a></span>
		<span class="col-sm-2">{{$contract->contract_responsable_name}}<br>
			<span class="note">Correo: {{$contract->contract_responsable_email}}</span>
		</span>
		<span class="col-sm-2">
			<a href="{{url("dashboard/convenio/editar/{$contract->opd->id}/{$contract->id}")}}" class="btn xs">Editar</a>
			<a href="{{url("dashboard/convenio/eliminar/{$contract->opd->id}/{$contract->id}")}}" class="btn danger xs" onclick = "return confirm('¿Estás seguro?')">Eliminar</a>
		</span>

		</li>
	@endforeach
	</ul>

@else
	<p>No hay convenios registrados para <a href="{{ url('dashboard/opd/'. $opd->id) }}">{{$opd->opd_name}}</a></p>
@endif


{{ $contracts->links() }}
</div>
</div>
@endsection
