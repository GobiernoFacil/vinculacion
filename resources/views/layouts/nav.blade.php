<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 right">
				<!-- Authentication Links -->
                	<button  class="logout" onclick="location.href='/../logout'">
                	    Cerrar Sesión
                	</button>
                	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                	    {{ csrf_field() }}
                	</form></p>
                
			</div>
		</div>
	</div>
</header>
