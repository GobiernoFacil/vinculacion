<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Traits\MessagesTrait;
use Auth;
class OpdUpdateStudentRequest extends Request
{
    use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {


        return Auth::user()->opd->students->find($this->route("id"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

      $user = Auth::user()->opd->students->find($this->route("id"));
      return [
        // user rules
        'matricula'     => 'required|'.($user->matricula != $this->matricula ? '|unique:students' : ''),
        'nombre'    => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'carrera' => 'required',
        'curp'=>'required'
      ];
    }
}
