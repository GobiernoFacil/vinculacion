<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-7">
				<h2 class="abierto"><i class="logo"></i>Empleo Abierto</h2>
			</div>
			<div class="col-sm-3 col-sm-offset-5 col-xs-5 right">
				<!-- Authentication Links -->
                	<button  class="logout" onclick="location.href='/../logout'">
                	    Cerrar Sesión
                	</button>
                	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                	    {{ csrf_field() }}
                	</form>
			</div>
		</div>
	</div>
</header>
<nav id="myTopnav" class="main_nav">
	<div class="container">
		<div class="col-sm-12">
			<a href="javascript:void(0);" onclick="myFunction()" class="icon">&#9776;</a>
			@if ($user->type == 'admin')
			<!-- nav admin-->
				@include('layouts.nav.nav_admin')
			@endif

			@if ($user->type == 'opd')
			<!-- nav universidades-->
				@include('layouts.nav.nav_opd')
			@endif

			@if ($user->type == 'puebla')
			<!-- nav secotrade-->
				@include('layouts.nav.nav_puebla')
			@endif

			@if($user->type == 'company')
			<!-- nav empresas-->
				@include('layouts.nav.nav_company')
			@endif

			@if ($user->type == 'student')
			<!-- nav estudiantes-->
				@include('layouts.nav.nav_student')
			@endif
			@if ($user->type == 'chamber')
			<!-- nav camaras-->
				@include('layouts.nav.nav_chamber')
			@endif
		</div>
	</div>
</nav>
