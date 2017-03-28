<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrdrformRequest extends FormRequest
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
            'date_needed' => 'required|date',
            'department_list' => 'required',
            'company_list' => 'required',
            'user_list' => 'required',
            'date_needed' => 'required|date',
            
            'document_title.*' => 'required',
            'control_code.*' => 'required',
            'rev_no.*' => 'required',
            'copy_no.*' => 'required',
            'copy_holder.*' => 'required',
            
            'ddrdistribution_list' => 'required'
        ];
    }
        public function messages()
    {
        return [
             'ddrdistribution_list.required' => 'Reason of Distribution is required'
        ];
    }
}
