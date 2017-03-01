<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrdrApproverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'remarks' => 'required',
            'attach_file' => 'required',
            'status_list' => 'required',
            'date_effective' => 'required|date'
        ];

          foreach($this->request->get('copy_no') as $key => $val)
          {
                 $rules['copy_no.'.$key] = 'required|max:10';
          }
    }
}
