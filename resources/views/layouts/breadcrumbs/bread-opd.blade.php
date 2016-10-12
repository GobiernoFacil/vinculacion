@if ($__env->yieldContent('breadcrumb_o') == 'estudiantes')
<!-- estudiantes -->
<li>Estudiantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante ver' || $__env->yieldContent('breadcrumb_o') == 'estudiante actualizar' || $__env->yieldContent('breadcrumb_o') == 'estudiante add' || $__env->yieldContent('breadcrumb_o') == 'estudiantes xls')
<li><a href="{{ url('tablero-opd/estudiantes')}}">Estudiantes</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante ver')
<li>Ver Estudiante</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante actualizar')
<li>Actualizar Estudiante</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante add')
<li>Agregar Estudiante</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiantes xls')
<li>Agregar Estudiantes</li>
@endif

@if ($__env->yieldContent('breadcrumb_o') == 'empresas')
<!-- empresas -->
<li>Empresas</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'empresa ver' || $__env->yieldContent('breadcrumb_o') == 'empresa actualizar' || $__env->yieldContent('breadcrumb_o') == 'empresa add' || $__env->yieldContent('breadcrumb_o') == 'empresas xls')
<li><a href="{{ url('tablero-opd/empresas')}}">Empresas</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'empresa ver')
<li>Ver Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'empresa actualizar')
<li>Actualizar Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'empresa add')
<li>Agregar Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'empresas xls')
<li>Agregar Empresas</li>
@endif

@if ($__env->yieldContent('breadcrumb_o') == 'stats')
<!-- stats -->
<li>Estadísticas</li>
@endif

@if ($__env->yieldContent('breadcrumb_o') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'me-update')
<li><a href="{{ url('tablero-opd/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif