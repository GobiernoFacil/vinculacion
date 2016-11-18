@extends('layouts.master-admin')
@section('title', 'Oferta Académica')
@section('description', 'Oferta Académica de Universidad')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opd offer add')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>Crear oferta académica</h1>
	</div>
	<div class="col-sm-6 col-sm-offset-3">
		{!! Form::open(["url" => "dashboard/oferta-academica/crear"]) !!}
			<p>Carrera: {{Form::text("academic_name", null, ["class" => "form-control"])}}</p>
			<p>Universidad: {{Form::select("opd", $opds, null,  ["class" => "form-control"])}}</p>
			<p><input type="submit" value="Crear" class="btn"></p>
  		{!! Form::close() !!}
	</div>
</div>
@endsection