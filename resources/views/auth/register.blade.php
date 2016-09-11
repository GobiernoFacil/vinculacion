@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Registro</h1>
			<!--registerform-->
			@include('layouts.forms.register_form')
        </div>
    </div>
</div>
@endsection
