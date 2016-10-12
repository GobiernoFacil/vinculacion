@if ($__env->yieldContent('breadcrumb_o') == 'estudiantes')
<!-- estudiantes -->
<li>Estudiantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_o') == 'estudiante ver' || $__env->yieldContent('breadcrumb_o') == 'estudiante actualizar' || $__env->yieldContent('breadcrumb_o') == 'estudiante add' || $__env->yieldContent('breadcrumb_o') == 'estudiantes xls')
<li><a href="{{ url('tablero-opd/estudiantes')}}">Estudiantes
</a></li>
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
