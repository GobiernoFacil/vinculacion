<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UpdateAdminRequest extends Request
{
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
        'name'     => 'required',
        'email'    => 'required|email|max:255' . (Auth::user()->email != $this->email ? '|unique:users' : ''),
        'password' => 'min:6',
      ];
    }

    public function messages(){
      return [
        'name'         => 'El nombre es requerido',
        'password.min' => 'tu nueva contraseña debe tener por lo menos 6 caracteres',
        'email'        => 'tu correo debe ser válido y no estar en el sistema'
      ];
    }
}
