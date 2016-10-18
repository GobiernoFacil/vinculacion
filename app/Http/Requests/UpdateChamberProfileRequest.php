<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

use App\Traits\MessagesTrait;
class UpdateChamberProfileRequest extends Request
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
        $chamber = Auth::user()->chamber;
        return [
            //
            // company rules
            'chamber_rfc' => 'required|'.($chamber->chamber_rfc != $this->chamber_rfc ? '|unique:chambers' : ''),
            'chamber_comercial_name' => 'required|max:255',
            // contact rules
            'cname' => 'max:255',
            'cphone' => 'max:255',
            'cemail' => 'email|max:255'
        ];
    }
}
