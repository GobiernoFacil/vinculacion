<a href="{{url('tablero-camara')}}" class="{{$__env->yieldContent('bodyclass') == 'chamber' ? 'current' : ''}} "><i class="material-icons">home</i> Tablero</a>
<a href="{{url('tablero-camara/vacantes')}}"  class="{{$__env->yieldContent('bodyclass') == 'chamber vacantes' ? 'current' : ''}} "><i class="material-icons">business_center</i> Vacantes</a>
<a href="{{url('tablero-camara/empresas')}}"  class="{{$__env->yieldContent('bodyclass') == 'chamber empresas' ? 'current' : ''}} "><i class="material-icons">domain</i> Empresas</a>
<a href="{{url('tablero-camara/yo')}}"  class="{{$__env->yieldContent('bodyclass') == 'chamber me' ? 'current' : ''}} "><i class="material-icons">person</i> Perfil</a>
