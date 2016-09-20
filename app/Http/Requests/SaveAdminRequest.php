<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveAdminRequest extends Request
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
        'email'    => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ];
    }

    public function messages(){
      return [
        'name.required'  => 'El nombre es requerido',
        'password.min'   => 'tu nueva contraseña debe tener por lo menos 6 caracteres',
        'email.required' => 'tu correo debe ser válido y no estar en el sistema',
        'email.email'    => 'tu correo debe ser válido y no estar en el sistema',
        'email.max'      => 'tu correo debe ser válido y no estar en el sistema',
        'email.unique'   => 'tu correo debe ser válido y no estar en el sistema'
      ];
    }
}
