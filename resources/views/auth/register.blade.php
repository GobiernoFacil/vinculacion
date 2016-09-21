@extends('layouts.master')
@section('title', 'Registrar usuario')
@section('description', 'Registrar usuario en Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'login')
@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Registro</h1>
			<!--registerform-->
			@include('layouts.forms.register_form')
        </div>
    </div>
</div>
</section>
@endsection
