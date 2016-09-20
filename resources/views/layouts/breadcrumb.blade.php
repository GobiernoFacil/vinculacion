<div class="container">
	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<ul>
				<li><a href="{{ url('/dashboard')}}"><i class="material-icons">home</i> Dashboard</a></li>
				@if ($__env->yieldContent('breadcrumb_c') == 'buscar-requerimiento')
				<li><i class="material-icons">shopping_cart</i> Requerimientos</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_c') == 'agregar-requerimiento')
				<li><a href="{{url('comprador/lista-proveeduria')}}"><i class="material-icons">shopping_cart</i> Requerimientos</a></li>
				<li>Agregar</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_c') == 'actualizar-requerimiento')
				<li><a href="{{url('comprador/lista-proveeduria')}}"><i class="material-icons">shopping_cart</i> Requerimientos</a></li>
				<li>Actualizar</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_c') == 'ver-requerimiento')
				<li><a href="{{url('comprador/lista-proveeduria')}}"><i class="material-icons">shopping_cart</i> Requerimientos</a></li>
				<li>Ver</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_c') == 'perfil')
				<li><i class="material-icons">person</i> Perfil</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_c') == 'perfil edit')
				<li><a href="{{ $userData['type'] == 'buyer' ? url('comprador-perfil') : url('perfil')  }}"><i class="material-icons">person</i> Perfil</a></li>
				<li>Editar</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'compradores')
				<li><i class="material-icons">domain</i> Empresas Compradoras</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'compradores ver')
				<li><a href="{{ url('lista-compradores')}}"><i class="material-icons">domain</i> Empresas Compradoras</a></li>
				<li>Empresa</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'usuarios')
				<li><i class="material-icons">people</i> Usuarios Sectur</li>
				@endif
				
			</ul>
		</div>
	</div>
</div>