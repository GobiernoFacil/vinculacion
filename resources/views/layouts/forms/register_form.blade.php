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
	    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" autofocus placeholder="Correo" required>
	    @if ($errors->has('email'))
	        <span class="help-block">
	            <strong>{{ $errors->first('email') }}</strong>
	        </span>
	    @endif
	</div>








    <!--control-->
    <div id="control_div" class="form-group {{ $errors->has('control') ? ' has-error' : '' }}">
        <input id="control" type="control" class="form-control" name="control" value="{{ old('control') }}" autofocus placeholder="Número de control" required>
        @if ($errors->has('control'))
            <span class="help-block">
                <strong>{{ $errors->first('control') }}</strong>
            </span>
        @endif
    </div>

    <!--opd-->
    <div id="opd_div" class="form-group {{ $errors->has('opd') ? ' has-error' : '' }}">
      <select id="opd" type="opd" class="form-control" name="opd">
      @foreach($opds as $opd)
        <option value="{{$opd->opd->id}}">{{$opd->opd->opd_name}}</option>
      @endforeach
      </select>
        @if ($errors->has('opd'))
            <span class="help-block">
                <strong>{{ $errors->first('opd') }}</strong>
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

<script>
var _user_select = document.getElementById("type"),
    _control_div = document.getElementById("control"),
    _opd_div     = document.getElementById("opd")
    _control     = document.getElementById("control"),
    _opd         = document.getElementById("opd");

@if ($errors->has('control'))
  _control_div.style.display = "block";
  _opd_div.style.display     = "block";
  _control.required = true;
  _opd.required     = true;
@else
  _control_div.style.display = "none";
  _opd_div.style.display     = "none";
  _control.required = false;
  _opd.required     = false;
@endif

_user_select.addEventListener("change", function(e){
    var val = this.value;
    if(val == "student"){
        _control_div.style.display = "block";
        _opd_div.style.display     = "block";
        _control.required = true;
        _opd.required     = true;
    }
    else{
        _control_div.style.display = "none";
        _opd_div.style.display     = "none";
        _control.required = false;
        _opd.required     = false;
    }
});

</script>
