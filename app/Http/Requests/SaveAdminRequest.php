<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;

class SaveAdminRequest extends Request
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
          'email'    => 'required|email|max:255|unique:users',
          'password' => 'required|min:6'
        ];
    }
}
