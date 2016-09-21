<div class="container">
	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<ul>
				<li><a href="{{ url('/dashboard')}}"><i class="material-icons">home</i> 
				</a></li>
				@if ($__env->yieldContent('breadcrumb_a') == 'user')
				<li>Usuarios Administradores</li>
				@endif								
			</ul>
		</div>
	</div>
</div>