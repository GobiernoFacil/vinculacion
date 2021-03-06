<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Traits\MessagesTrait;
class OpdSaveCompaniesRequest extends Request
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
              // company rules
              'rfc' => 'required|unique:companies',
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
