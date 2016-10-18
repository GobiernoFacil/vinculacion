<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use App\models\Company;
use Auth;
// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;
class UpdateCompanyRequest extends Request
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
    if($this->route("id")){
      $company = Company::with('user')->find($this->route("id"));
    }else{
      $user = Auth::user();
    }

    if($this->email){
      if(empty($company->user->email)){
        $email = '';
      }else{
        $email = $company->user->email;
      }
      return [
        // user rules
        'name'     => 'required',
        'email'    => 'required|email|max:255' . ($email != $this->email ? '|unique:users' : ''),
        'password' => 'min:6',

        // company rules
        'rfc'              => 'required'.($company->rfc != $this->rfc ? '|unique:companies' : ''),
        'razon_social'     => 'required|max:255',
        'nombre_comercial' => 'required|max:255',
        'zip'              => 'digits_between:3,6',
        'logo'             => 'image',

        // contact rules
        'cname'  => 'max:255',
        'cphone' => 'max:255',
        'cemail' => 'email|max:255'
      ];
    }else {
      # code...
      return [

        // company rules
        'rfc'              => 'required|'.($company->rfc != $this->rfc ? '|unique:companies' : ''),
        'razon_social'     => 'required|max:255',
        'nombre_comercial' => 'required|max:255',
        'zip'              => 'digits_between:3,6',
        'logo'             => 'image',

        // contact rules
        'cname'  => 'max:255',
        'cphone' => 'max:255',
        'cemail' => 'email|max:255'
      ];
    }
  }
}
