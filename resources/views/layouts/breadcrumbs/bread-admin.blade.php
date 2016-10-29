@if ($__env->yieldContent('breadcrumb_a') == 'user')
<!-- users -->
<li>Usuarios Administradores</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'user create')
<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
</a></li>
<li>Crear Usuario</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'user-update')
<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
</a></li>
<li>Editar Usuario</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'user-view')
<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
</a></li>
<li>Ver Usuario</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opds')
<!-- opds -->
<li>Universidades</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opd-view')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li>Ver Universidad</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opd-add')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li>Agregar Universidad</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opd-update')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li>Actualizar Universidad</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'estudiantes')
<!-- estudiantes -->
<li>Estudiantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'student-view')
<li><a href="{{ url('dashboard/estudiantes')}}">Estudiantes
</a></li>
<li>Ver Estudiante</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'student-add')
<li><a href="{{ url('dashboard/estudiantes')}}">Estudiantes
</a></li>
<li>Agregar Estudiante</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'student-update')
<li><a href="{{ url('dashboard/estudiantes')}}">Estudiantes
</a></li>
<li>Actualizar Estudiante</li>
@endif


<!-- convenios -->


@if ($__env->yieldContent('breadcrumb_a') == 'opds contratos')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li>Convenios</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opds add-contratos')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li><a href='{{ url("dashboard/contratos/{$opd_id}")}}'>Convenios
</a></li>
<li>Agrear Convenio</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opds update-contratos')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li><a href='{{ url("dashboard/contratos/{$opd->id}")}}'>Convenios
</a></li>
<li>Actualizar Convenio</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opds contrato')
<li><a href="{{ url('dashboard/opds')}}">Universidades
</a></li>
<li><a href='{{ url("dashboard/contratos/{$opd->id}")}}'>Convenios
</a></li>
<li>Ver Convenio</li>
@endif


@if ($__env->yieldContent('breadcrumb_a') == 'empresas')
<!-- empresas -->
<li>Empresas</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'company-view')
<li><a href="{{ url('dashboard/empresas')}}">Empresas
</a></li>
<li>Ver Empresa</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'me')
<!-- me -->
<li>Mi Perfil</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'me-update')
<li><a href="{{ url('dashboard/yo')}}">Mi Perfil
</a></li>
<li>Editar Perfil</li>
@endif
