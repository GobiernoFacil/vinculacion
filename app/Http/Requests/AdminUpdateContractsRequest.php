<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUpdateContractsRequest extends Request
{
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
          // contract rules
          'contract_name' => 'required',
          'contract_objective' => 'required|max:255',
          'contract_description' => 'required|max:255',
          'company'      => 'required',
          'company_id'      => 'required',
          'contract_responsable_name'      => 'required',
          'contract_responsable_email'      => 'required|email',
      ];
    }
}
