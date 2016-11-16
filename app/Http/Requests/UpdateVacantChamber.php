<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use App\Models\ChamberCompany;
use App\Models\Vacant;
use App\Traits\MessagesTrait;
class UpdateVacantChamber extends Request
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
        "company_id" =>'required',
        "job"    => 'required',
        "url"    => 'url',
        "salary" => 'numeric',
        "company"=> 'required'
      ];
    }
}
