@if ($__env->yieldContent('breadcrumb_p') == 'vacantes')
<!-- vacantes -->
<li>Vacantes</li>
@endif

@if ($__env->yieldContent('breadcrumb_p') == 'vacante ver' || $__env->yieldContent('breadcrumb_p') == 'vacante actualizar' || $__env->yieldContent('breadcrumb_p') == 'vacante add' || $__env->yieldContent('breadcrumb_p') == 'vacantes xls')
<li><a href="{{ url('tablero-secotrade/vacantes')}}">Vacantes</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_p') == 'vacante ver')
<li>Ver vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_p') == 'vacante actualizar')
<li>Actualizar vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_p') == 'vacante add')
<li>Agregar vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_p') == 'vacantes xls')
<li>Agregar vacantes</li>
@endif




@if ($__env->yieldContent('breadcrumb_p') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_p') == 'me-update')
<li><a href="{{ url('tablero-secotrade/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
