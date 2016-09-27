<?php

namespace App\Traits;

trait MessagesTrait{
  public function messages(){
      return [
        // SUSCRIBE
        'conditions.required' =>'Debes aceptar las condiciones de privacidad',
        'type.required'       =>'Debes seleccionar un tipo de usuario',
        'type.in'             => "Solo puedes registrar empresas o estudiantes",
        
        // USER
        'name.required'  => 'El nombre es requerido',
        'password.min'   => 'la contraseña debe tener por lo menos 6 caracteres',
        'email.required' => 'el correo es requerido',
        'email.email'    => 'el correo debe ser válido',
        'email.max'      => 'el correo debe tener menos de 255 caracteres',
        'email.unique'   => 'el correo debe ser único en el sistema',

        // CHAMBER
        'chamber_comercial_name.required' => 'el nombre de la cámara es necesario',
        'chamber_rfc.required'            => 'el rfc es requerido',
        'chamber_rfc.max'                 => 'el campo no puede tener más de 14 caracteres',
        'chamber_rfc.unique'              => 'el rfc ya está registrado por otra cámara',
      ];
    }
}