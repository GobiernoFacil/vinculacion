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
@if ($__env->yieldContent('breadcrumb_a') == 'opds contratos uni' || $__env->yieldContent('breadcrumb_a') == 'opds add-contratos' || $__env->yieldContent('breadcrumb_a') == 'opds update-contratos' || $__env->yieldContent('breadcrumb_a') == 'opds contrato')
<li><a href="{{ url('dashboard/opds')}}">Universidades</a></li>
<li><a href="{{ url('dashboard/opd/'. $opd->id)}}">{{ $opd->opd_name}}</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opds contratos uni')
<li>Convenios</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opds add-contratos')
<li><a href='{{ url("dashboard/convenios/{$opd_id}")}}'>Convenios</a></li>
<li>Agrear Convenio</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opds update-contratos')
<li><a href='{{ url("dashboard/convenios/{$opd->id}")}}'>Convenios</a></li>
<li>Actualizar Convenio</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opds contrato')
<li><a href='{{ url("dashboard/convenios/{$opd->id}")}}'>Convenios</a></li>
<li>Ver Convenio</li>
@endif

@if ($__env->yieldContent('breadcrumb_a') == 'opds contratos all')
<li><a href="{{ url('dashboard/opds')}}">Universidades</a></li>
<li>Convenios</li>
@endif



@if ($__env->yieldContent('breadcrumb_a') == 'opd offer')
<!-- oferta-->
<li><a href="{{ url('dashboard/opds')}}">Universidades</a></li>
<li>Oferta Académica</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opd offer edit' || $__env->yieldContent('breadcrumb_a') == 'opd offer add' || $__env->yieldContent('breadcrumb_a') == 'opd offer view')
<li><a href="{{ url('dashboard/opds')}}">Universidades</a></li>
<li><a href="{{ url('dashboard/oferta-academica') }}">Oferta Académica</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opd offer edit')
<!-- editar oferta-->
<li>Editar Oferta Académica</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opd offer add')
<!-- agregar oferta-->
<li>Agregar Oferta Académica</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'opd offer view')
<!-- ver oferta-->
<li>Ver Oferta Académica</li>
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

@if ($__env->yieldContent('breadcrumb_a') == 'chambers')
<!-- chambers -->
<li>Cámaras</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'chamber-update' || $__env->yieldContent('breadcrumb_a') == 'chamber-add' || $__env->yieldContent('breadcrumb_a') == 'chamber-view')
<li><a href="{{ url('dashboard/camaras')}}">Cámaras</a></li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'chamber-add')
<li>Crear Cámara</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'chamber-update')
<li>Editar Cámara</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'chamber-view')
<li>Ver Cámara</li>
@endif


@if ($__env->yieldContent('breadcrumb_a') == 'vacantes')
<!-- vacancies -->
<li>Vacantes</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'vacante ver')
<li><a href='{{ url("dashboard/vacantes")}}'>Vacantes
</a></li>
<li>Ver Vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'vacante add')
<li><a href='{{ url("dashboard/vacantes")}}'>Vacantes
</a></li>
<li>Agregar Vacante</li>
@endif
@if ($__env->yieldContent('breadcrumb_a') == 'vacante edit')
<li><a href='{{ url("dashboard/vacantes")}}'>Vacantes
</a></li>
<li>Actualizar Vacante</li>
@endif
