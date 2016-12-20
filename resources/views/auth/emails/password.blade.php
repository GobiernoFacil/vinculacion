<p>Hola, has recibido este correo para reemplazar tu contraseña. Da click aquí para recuperar contraseña: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a></p>

<p>Si no deseas cambiar tu contraseña, has caso omiso de este correo.</p>
