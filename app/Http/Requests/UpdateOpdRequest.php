<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\models\Opd;

// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;

class UpdateOpdRequest extends Request
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
        $opd = Opd::with('user')->find($this->route("id"));

        return [
          // user rules
          'name'     => 'required',
          'email'    => 'required|email|max:255' . ($opd->user->email != $this->email ? '|unique:users' : ''),
          'password' => 'min:6',

          // opd rules
          'opd_name' => 'required|max:255',
          'url'      => 'url',
          'city'     => 'required|max:255',
          'state'    => 'required|max:255',
          'zip'      => 'digits_between:3,6',

          // contact rules
          'cname' => 'max:255',
          'cphone' => 'max:255',
          'cemail' => 'email|max:255'
        ];
    }
}
