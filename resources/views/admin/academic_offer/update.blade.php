@extends('layouts.master-admin')
@section('title', 'Editar Oferta Académica')
@section('description', 'Editar Oferta Académica de Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd offer edit')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Editar Oferta académica</h1>
	</div>
	<div class="col-sm-6 col-sm-offset-3">
	{!! Form::model($offer, ["url" => "dashboard/oferta-academica/crear"]) !!}
  	<p>Carrera: {{Form::text("academic_name", null, ["class" => "form-control"])}}</p>
  	<p>Universidad: {{Form::select("opd", $opds, array_search($offer->opd, $opds), ["class" => "form-control"])}}</p>
  	<p><input type="submit" value="Editar" class="btn"></p>
  {!! Form::close() !!}
	</div>
</div>
@endsection