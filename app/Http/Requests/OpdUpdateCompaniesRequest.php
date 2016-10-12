<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Traits\MessagesTrait;
use Auth;
class OpdUpdateCompaniesRequest extends Request
{
    use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->opd->companies->find($this->route("id"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $user = Auth::user()->opd->companies->find($this->route("id"));
          return [
               // company rules
               'rfc' => 'required|'.($user->rfc != $this->rfc ? '|unique:companies' : ''),
               'razon_social' => 'required|max:255',
               'nombre_comercial' => 'required|max:255',
               'zip'      => 'digits_between:3,6',

               // contact rules
               'cname' => 'max:255',
               'cphone' => 'max:255',
               'cemail' => 'email|max:255'
        ];
    }
}
