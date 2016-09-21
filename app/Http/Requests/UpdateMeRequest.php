<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;

class UpdateMeRequest extends Request
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
        'name'     => 'required',
        'email'    => 'required|email|max:255' . (Auth::user()->email != $this->email ? '|unique:users' : ''),
        'password' => 'min:6',
      ];
    }
}
