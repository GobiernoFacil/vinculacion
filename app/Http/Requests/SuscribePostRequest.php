<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SuscribePostRequest extends Request
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
        'email'                 => 'required|email|max:255|unique:users',
        'password'              => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6|same:password',
        'conditions'            => 'required',
        'type'                  => 'required'
      ];
    }

    public function messages(){
      return [
        'conditions.required' =>'Debes aceptar las condiciones de privacidad',
        'type.required'       =>'Debes seleccionar un tipo de empresa'
      ];
    }
}
