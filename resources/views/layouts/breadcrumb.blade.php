<div class="container">
	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<ul>
				<li><a href="{{ url('dashboard')}}"><i class="material-icons">home</i> </a></li>				
				@if ($__env->yieldContent('breadcrumb_a') == 'user')
				<!-- users -->
				<li>Usuarios Administradores</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'user create')
				<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
				</a></li>
				<li>Crear Usuario</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'user-update')
				<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
				</a></li>
				<li>Editar Usuario</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'user-view')
				<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
				</a></li>
				<li>Ver Usuario</li>
				@endif
												
				@if ($__env->yieldContent('breadcrumb_a') == 'opds')
				<!-- opds -->
				<li>Universidades</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'estudiantes')
				<!-- estudiantes -->
				<li>Estudiantes</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'empresas')
				<!-- estudiantes -->
				<li>Empresas</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'me')
				<!-- me -->
				<li>Mi Perfil</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'me-update')
				<li><a href="{{ url('dashboard/yo')}}">Mi Perfil
				</a></li>
				<li>Editar Perfil</li>
				@endif
			</ul>
		</div>
	</div>
</div>