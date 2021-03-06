<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

 use App\Traits\MessagesTrait;

 use Auth;

class SaveVacantRequest extends Request
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
          "job"    => 'required',
          "url"    => 'url',
          "salary" => 'numeric',
          "tags"   => 'required'
        ];
    }
}
