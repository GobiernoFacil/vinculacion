@if ($__env->yieldContent('breadcrumb_c') == 'empresas')
<!-- empresas -->
<li>Empresas</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'empresa ver' || $__env->yieldContent('breadcrumb_c') == 'empresa actualizar' || $__env->yieldContent('breadcrumb_c') == 'empresa add' || $__env->yieldContent('breadcrumb_c') == 'empresas xls')
<li><a href="{{ url('tablero-camara/empresas')}}">Empresas</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'empresa ver')
<li>Ver Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'empresa actualizar')
<li>Actualizar Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'empresa add')
<li>Agregar Empresa</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'empresas xls')
<li>Agregar Empresas</li>
@endif

@if ($__env->yieldContent('breadcrumb_c') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_c') == 'me-update')
<li><a href="{{ url('tablero-opd/yo')}}">Mi Perfil</a></li>
<li>Editar Perfil</li>
@endif
