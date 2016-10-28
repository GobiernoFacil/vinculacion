<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h2 class="sep">Secretaría de Educación Pública del Estado de Puebla</h2>
			</div>
			<div class="col-sm-4">
				<h2 class="abierto">
					@if($__env->yieldContent('bodyclass') == 'home')
					<i class="logo"></i>Empleo Abierto</h2>
					@else
					<a href="{{ url('')}}"><i class="logo"></i>Empleo Abierto</a>
					@endif
				</h2>
			</div>
			<div class="col-sm-4">
				<ul>
					<li>
						@if($__env->yieldContent('bodyclass') == 'home')
						<a class="md-trigger register" data-modal="modal-1">
						@else
						<a class="md-trigger register" data-modal="modal-1"  href="{{ url('register')}}">
						@endif
						<i class="material-icons">person_add</i> <span>Regístrate</span></a>
					</li>
					<li>
						@if($__env->yieldContent('bodyclass') == 'home')
						<a class="md-trigger"  data-modal="modal-3">
						@else
						<a class="md-trigger"  data-modal="modal-3"  href="{{ url('login')}}">
						@endif
							<i class="material-icons">person</i> <span>Iniciar Sesión</span>
						</a>
					</li>
					<li>
						@if($__env->yieldContent('bodyclass') == 'home')
						<a class="md-trigger vacancies" data-modal="modal-2">
						@else
						<a class="md-trigger vacancies" data-modal="modal-2" href="{{ url('register')}}">
						@endif
							<i class="material-icons">business_center</i> <span>Publica Vacantes</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
