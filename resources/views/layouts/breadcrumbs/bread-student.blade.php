
@if ($__env->yieldContent('breadcrumb_e') == 'vacantes')
<!-- vacancies -->
<li>Vacantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'vacante ver' || $__env->yieldContent('breadcrumb_e') == 'vacantes aplicadas')
<li><a href="{{ url('tablero-estudiante/vacantes')}}">Vacantes</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'vacantes aplicadas')
<li>Vacantes Aplicadas</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'vacante ver')
<li>Ver Vacante</li>
@endif


@if ($__env->yieldContent('breadcrumb_e') == 'entrevistas')
<!-- interviews -->
<li>Entrevistas</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'entrevista ver')
<li><a href="{{ url('tablero-estudiante/entrevistas')}}">Entrevistas</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'entrevista ver')
<li>Ver Entrevista</li>
@endif

@if ($__env->yieldContent('breadcrumb_e') == 'cv')
<!-- cv -->
<li>Mi CV</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'cv-update')
<li><a href="{{ url('tablero-estudiante/cv')}}">Mi CV</a></li>
<li>Editar CV</li>
@endif

@if ($__env->yieldContent('breadcrumb_e') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'me-update')
<li><a href="{{ url('tablero-estudiante/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_e') == 'me opd')
<li><a href="{{ url('tablero-estudiante/yo')}}">Mi Perfil</a></li>
<li>Mi Universidad</li>
@endif
