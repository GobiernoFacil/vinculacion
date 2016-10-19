<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

// [ LOAD TRAITS ]
use App\Traits\MessagesTrait;

class SuscribePostRequest extends Request
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
        'email'                 => 'required|email|max:255|unique:users',
        'password'              => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6|same:password',
        'conditions'            => 'required',
        'type'                  => 'required|in:company,student',
        'control'               => 'required_if:type,student|exists:students,matricula,user_id,NULL,opd_id,' . $this->opd,
        'opd'                   => 'required_if:type,student|exists:opds,id',
      ];
    }
}
