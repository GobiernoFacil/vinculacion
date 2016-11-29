<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Traits\MessagesTrait;

 use Auth;

 use App\models\Vacant;

class UpdateVacancyRequest extends Request
{
    use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // obtiene el usuario y la ruta
      $id   = $this->route('id');
      $user = Auth::user();

      // si es admin, sí puede hacer lo que sea
      if($user->type == "admin"){
        return true;
      }

      // si es empresa, cámara de comercio o la secotrade, se obtiene su id
      elseif($user->type == "company"){
        $_id = $user->company->id;
      }
      elseif($user->type == "chamber"){
        $_id = $user->chamber->id;
      }
      elseif($user->type == "puebla"){
        $_id = $user->id;
      }
      else{
        return false;
      }

      // revisa si el usuario puede editar el recurso
      return Vacant::where('id', $id)
                  ->where('company_id', $_id)->exists();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          "job"    => 'required',
          "url"    => 'url',
          "salary" => 'numeric',
          "tags"   => 'required'
        ];
    }
}
