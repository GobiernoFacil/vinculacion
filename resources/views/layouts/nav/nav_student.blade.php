<a href="{{url('tablero-estudiante')}}" class="{{$__env->yieldContent('bodyclass') == 'student' ? 'current' : ''}} "><i class="material-icons">home</i> Tablero</a>
<a href="{{url('tablero-estudiante/vacantes')}}"  class="{{$__env->yieldContent('bodyclass') == 'student vacantes' ? 'current' : ''}} "><i class="material-icons">business_center</i> Vacantes</a>
<a href="{{url('tablero-estudiante/entrevistas')}}" class="{{$__env->yieldContent('bodyclass') == 'student entrevistas' ? 'current' : ''}} "><i class="material-icons">assignment</i> Entrevistas</a>
<a href="{{url('tablero-estudiante/cv')}}" class="{{$__env->yieldContent('bodyclass') == 'student cv' ? 'current' : ''}} "><i class="material-icons">folder</i> CV</a>
<a href="{{url('tablero-estudiante/yo')}}"  class="{{$__env->yieldContent('bodyclass') == 'student me' ? 'current' : ''}} "><i class="material-icons">person</i> Perfil</a>
