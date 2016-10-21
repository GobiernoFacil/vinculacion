<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h2 class="abierto"><i class="logo"></i>Empleo Abierto</h2>
			</div>
			<div class="col-sm-3 col-sm-offset-5 right">
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
<nav class="main_nav">
	<div class="container">
		<div class="col-sm-12">
			@if ($user->type == 'admin')
			<!-- nav admin-->
				@include('layouts.nav.nav_admin')
			@endif

			@if ($user->type == 'opd')
			<!-- nav universidades-->
				@include('layouts.nav.nav_opd')
			@endif

			@if($user->type == 'company')
			<!-- nav empresas-->
				@include('layouts.nav.nav_company')
			@endif

			@if ($user->type == 'student')
			<!-- nav estudiantes-->
				@include('layouts.nav.nav_student')
			@endif

		</div>
	</div>
</nav>
