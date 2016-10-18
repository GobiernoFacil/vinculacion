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

        // OPD
        'opd_name.required' => "el nombre de la universidad es requerido",
        'opd_name.max'      => "el nombre debe tener menos de 255 caracteres",

        // ALL
        'url.url'        => 'el campo debe ser un url válido',
        'city.required'  => 'el campo de municipio es requerido',
        'state.required' => 'el campo de estado es requerido',
        'zip.numeric'    => 'el código postal solo acepta números',
        'zip.max'        => 'el código postal solo puede tener 5 dígitos',

        // files
        'file.required' => 'El archivo es requerido',
        'file.file'     => 'El archivo debe ser válido',
        'file.mimes'    => 'El archivo debe ser del tipo requerido',
        'file.max'      => 'El archivo no puede ser mayor al límite establecido',
        'logo.image'    => 'El archivo del logo debe ser una imagen válida',

        // students
        'nombre.required'           =>   'El nombre es requerido',
        'apellido_paterno.required' =>   'El apellido paterno es requerido',
        'apellido_materno.required' =>   'El apellido materno es requerido',
        'matricula.required'        =>   'La matrícula es requerida',
        'matricula.unique'          =>   'Esta matrícula ya existe',
        'curp.required'             =>   'El CURP es requerido',
        'carrera.required'           =>   'La carrera es requerida',

        // companies
        'rfc.required'              =>   'El R.F.C. es requerido',
        'razon_social.required'     =>   'La razón social es requerida',
        'nombre_comercial.required' =>   'El nombre comercial  es requerido',
        'rfc.unique'                =>   'Este R.F.C. ya existe',

        // contracts
        'contract_opd.required'               =>   'El Organismo Público Descentralizado es requerido',
        'contract_name.required'              =>   'El nombre es requerido',
        'contract_objective.required'         =>   'El objetivo  es requerido',
        'contract_description.required'       =>   'La descripción es requerida',
        'contract_responsable_name.required'  =>   'El nombre del responsable es requerido',
        'contract_responsable_email.required' =>   'El correo del responsable es requerido',
      ];
    }
}
