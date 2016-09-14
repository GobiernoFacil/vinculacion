<form class="form-horizontal" role="form" method="POST" action="{{ url('registro') }}">
	{{ csrf_field() }}

  <!--tipo-->
  <div class="form-group">
    <select id="type"  class="form-control{{ $errors->has('type') ? ' has-error' : '' }}" name="type" value="{{ old('type') }}">
      <option disabled selected value>Tipo de usuario</option>
      <option value="company"> Empresa </option>
      <option value ="student"> Estudiante </option>
    </select>
    @if ($errors->has('type'))
        <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
  </div>
	<!--email-->
	<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
	    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="Correo" required>
	    @if ($errors->has('email'))
	        <span class="help-block">
	            <strong>{{ $errors->first('email') }}</strong>
	        </span>
	    @endif
	</div>
	<!--password-->
	<div class="row">
		<div class="col-sm-5">
    		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    			<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
			
    			@if ($errors->has('password'))
    			    <span class="help-block">
    			        <strong>{{ $errors->first('password') }}</strong>
    			    </span>
    			@endif
    		</div>
		</div>
		<div class="col-sm-5 col-sm-offset-2">
    		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    		    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
			
    		    @if ($errors->has('password_confirmation'))
    		        <span class="help-block">
    		            <strong>{{ $errors->first('password_confirmation') }}</strong>
    		        </span>
    		    @endif
    		</div>
		</div>
	</div>

    <!--terms-->
    <div class="form-group">
        <div class="col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="conditions"> Acepto <a href="{{ url('privacidad') }}">Condiciones y Privacidad</a>
                </label>
            </div>
            @if ($errors->has('conditions'))
                <span class="help-block">
                    <strong>{{ $errors->first('conditions') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!--submit-->
    <div class="form-group">
    	<button type="submit" class="btn btn-primary">
    	    Registrar
    	</button>
	</div>

    <!--login-->
    <p class="center"> ¿Ya tienes cuenta? <a href="{{ url('login') }}">Accede a tu cuenta</a></p>
</form>
