<a href="{{url('tablero-opd')}}" class="{{$__env->yieldContent('bodyclass') == 'opd' ? 'current' : ''}} "><i class="material-icons">home</i> Tablero</a>
<a href="{{url('tablero-opd/estudiantes')}}"  class="{{$__env->yieldContent('bodyclass') == 'opd estudiantes' ? 'current' : ''}} "><i class="material-icons">school</i> Estudiantes</a>
<a href="{{url('tablero-opd/convenios')}}" class="{{$__env->yieldContent('bodyclass') == 'opds' ? 'current' : ''}} "><i class="material-icons">assignment</i> Convenios</a>
<a href="{{url('tablero-opd/empresas')}}"  class="{{$__env->yieldContent('bodyclass') == 'empresas' ? 'current' : ''}} "><i class="material-icons">domain</i> Empresas</a>
<a href="{{url('tablero-opd/estadisticas')}}"  class="{{$__env->yieldContent('bodyclass') == 'empresas' ? 'current' : ''}} "><i class="material-icons">perm_media</i> Estadísticas</a>
<a href="{{url('tablero-opd/yo')}}"  class="{{$__env->yieldContent('bodyclass') == 'me' ? 'current' : ''}} "><i class="material-icons">person</i> Perfil</a>