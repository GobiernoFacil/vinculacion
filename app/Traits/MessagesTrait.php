<?php

namespace App\Traits;

trait MessagesTrait{
  public function messages(){
      return [
        'name.required'  => 'El nombre es requerido',
        'password.min'   => 'la contraseña debe tener por lo menos 6 caracteres',
        'email.required' => 'el correo es requerido',
        'email.email'    => 'el correo debe ser válido',
        'email.max'      => 'el correo debe tener menos de 255 caracteres',
        'email.unique'   => 'el correo debe ser único en el sistema'
      ];
    }
}