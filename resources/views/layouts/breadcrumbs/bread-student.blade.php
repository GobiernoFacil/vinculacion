
@if ($__env->yieldContent('breadcrumb_o') == 'vacantes')
<!-- vacancies -->
<li>Vacantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'vacante ver')
<li><a href="{{ url('tablero-estudiante/vacantes')}}">Vacantes</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'vacante ver')
<li>Ver Vacante</li>
@endif


@if ($__env->yieldContent('breadcrumb_o') == 'entrevistas')
<!-- interviews -->
<li>Entrevistas</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'entrevista ver')
<li><a href="{{ url('tablero-estudiante/entrevistas')}}">Entrevistas</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'entrevista ver')
<li>Ver Entrevista</li>
@endif

@if ($__env->yieldContent('breadcrumb_o') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'me-update')
<li><a href="{{ url('tablero-estudiante/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
