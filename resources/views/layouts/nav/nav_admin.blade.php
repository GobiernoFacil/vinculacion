<a href="{{url('dashboard')}}" class="{{$__env->yieldContent('bodyclass') == 'dashboard' ? 'current' : ''}} ">
				<i class="material-icons">home</i> Tablero</a>
			<a href="{{url('dashboard/administradores')}}" class="{{$__env->yieldContent('bodyclass') == 'users' ? 'current' : ''}} "><i class="material-icons">group</i> Administradores</a>
			<a href="{{url('dashboard/opds')}}" class="{{$__env->yieldContent('bodyclass') == 'opds' ? 'current' : ''}} "><i class="material-icons">location_city</i> Universidades</a>
			<a href="{{url('dashboard/estudiantes')}}"  class="{{$__env->yieldContent('bodyclass') == 'estudiantes' ? 'current' : ''}} "><i class="material-icons">school</i> Estudiantes</a>
			<a href="{{url('dashboard/empresas')}}"  class="{{$__env->yieldContent('bodyclass') == 'empresas' ? 'current' : ''}} "><i class="material-icons">domain</i> Empresas</a>
			<a href="{{url('dashboard/vacantes')}}"  class="{{$__env->yieldContent('bodyclass') == 'vacantes' ? 'current' : ''}} "><i class="material-icons">business_center</i> Vacantes</a>
			<a href="{{url('dashboard/yo')}}"  class="{{$__env->yieldContent('bodyclass') == 'me' ? 'current' : ''}} "><i class="material-icons">person</i> Perfil</a>
