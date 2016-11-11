@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'student entrevistas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_e', 'entrevista ver')

@section('content')
<div class="row">
    <div class="col-sm-12">
    @if(!$user->enabled)
    	<!--- alert--->
    	@include('companies.alert-message')
    @endif
    </div>
    <div class="col-sm-9">
	    <!--title-->
    	<h1></h1>
    	
	    <!--info-->
	    {{$interview}}
    </div>
    <!--aplicar-->
</div>

<div class="separator"></div>



@endsection