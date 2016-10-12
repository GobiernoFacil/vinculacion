<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;
class OpdSaveStudentRequest extends Request
{
  use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        // user rules
        'matricula'     => 'required|unique:students',
        'nombre'    => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'carrera' => 'required',
        'curp'=>'required'
      ];
    }
}
