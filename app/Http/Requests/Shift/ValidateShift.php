<?php

namespace App\Http\Requests\Shift;

use Illuminate\Foundation\Http\FormRequest;

class ValidateShift extends FormRequest
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
            'user_id'=>['required', 'integer'],
            'start_date'=>['required', 'date'],
            'end_date'=>['required', 'date'],
            'description'=>['required', 'string'],
            'deleted_at'=>['required', 'date'],
            'suspended_at'=>['required', 'date']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [            
            'user_id.required' => 'Please provide user id',           
            'description.required' => 'Description field is required'           
        ];
    }
}
