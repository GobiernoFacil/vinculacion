@if ($__env->yieldContent('breadcrumb_o') == 'estudiantes')
<!-- estudiantes -->
<li>Estudiantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante ver' || $__env->yieldContent('breadcrumb_o') == 'estudiante actualizar' || $__env->yieldContent('breadcrumb_o') == 'estudiante add' || $__env->yieldContent('breadcrumb_o') == 'estudiantes xls' || $__env->yieldContent('breadcrumb_o') == 'estudiantes usuarios')
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
@if ($__env->yieldContent('breadcrumb_o') == 'estudiantes usuarios')
<li>Estudiantes usuarios</li>
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

@if ($__env->yieldContent('breadcrumb_o') == 'contracts')
<!-- contracts -->
<li>Convenios</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'convenio ver' || $__env->yieldContent('breadcrumb_o') == 'convenio actualizar' || $__env->yieldContent('breadcrumb_o') == 'convenio add' || $__env->yieldContent('breadcrumb_o') == 'convenios xls')
<li><a href="{{ url('tablero-opd/convenios')}}">Convenios</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'convenio ver')
<li>Ver Convenio</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'convenio actualizar')
<li>Actualizar Convenio</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'convenio add')
<li>Agregar Convenio</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'convenio xls')
<li>Agregar Convenios</li>
@endif

@if ($__env->yieldContent('breadcrumb_o') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'me-update')
<li><a href="{{ url('tablero-opd/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
