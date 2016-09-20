@extends('layouts.master')
@section('title', 'Iniciar Sesión')
@section('description', 'Iniciar Sesión en Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'login')

@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h2>Iniciar Sesión</h2>
                <div class="panel-body">
	                @include('layouts.forms.login_form')
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
