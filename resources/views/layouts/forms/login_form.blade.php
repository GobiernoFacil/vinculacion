<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
       	 <label for="email" class="col-md-4 control-label">Correo Electrónico</label>
        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Contraseña</label>

        <div class="col-md-12">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!--
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
        </div>
    </div>
    -->
	<!--submit-->
    <div class="form-group">
	    <div class="col-sm-12">
    	<button type="submit" class="btn btn-primary"> Iniciar Sesión</button>
	    </div>
	</div>

    <div class="form-group">
	    <div class="col-sm-12">
			<p class="center"><br> ¿Olvidaste tu contraseña? <a href="{{ url('/password/reset') }}">Recuperar contraseña</a></p>
	    </div>
    </div>
</form>