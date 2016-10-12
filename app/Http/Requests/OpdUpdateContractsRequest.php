<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Traits\MessagesTrait;
use Auth;
class OpdUpdateContractsRequest extends Request
{
    use MessagesTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->opd->contracts->find($this->route("id"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

      return [
          // contract rules
          'contract_name' => 'required',
          'contract_objective' => 'required|max:255',
          'contract_description' => 'required|max:255',
          'contract_opd'      => 'required',
          'contract_responsable_name'      => 'required',
          'contract_responsable_email'      => 'required|email',
      ];
    }
}
