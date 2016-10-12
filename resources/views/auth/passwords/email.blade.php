@extends('layouts.master')
@section('title', 'Recuperar contraseña - Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', '')
<!-- Main Content -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="separator">Recuperar contraseña</h1>
    </div>
  </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}" style ="height:150px;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Enviar link para recuperar contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                    <div style ="height:100px;"></div>
        </div>
    </div>
</div>
@endsection
