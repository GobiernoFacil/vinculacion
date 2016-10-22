
@if ($__env->yieldContent('breadcrumb_c') == 'vacantes')
<!-- vacancies -->
<li>Vacantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'vacante ver' || $__env->yieldContent('breadcrumb_c') == 'vacante add' || $__env->yieldContent('breadcrumb_c') == 'vacante edit')
<li><a href="{{ url('tablero-empresa/vacantes')}}">Vacantes</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'vacante ver')
<li>Ver Vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'vacante add')
<li>Agregar Vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'vacante edit')
<li>Editar Vacante</li>
@endif



@if ($__env->yieldContent('breadcrumb_c') == 'entrevistas')
<!-- interviews -->
<li>Entrevistas</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'entrevista ver')
<li><a href="{{ url('tablero-empresa/entrevistas')}}">Entrevistas</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'entrevista ver')
<li>Ver Entrevista</li>
@endif

@if ($__env->yieldContent('breadcrumb_c') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'me-update')
<li><a href="{{ url('tablero-empresa/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
