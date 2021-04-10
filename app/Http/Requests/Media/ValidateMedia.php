<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMedia extends FormRequest
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
            'name'=>['required', 'string'],
            'slug'=>['required', 'string'],
            'url'=>['required', 'string'],
            'path'=>['required', 'string'],
            'file_type'=>['required', 'string'],
            'size'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'description'=>['required', 'string'],
            'deleted_at'=>[ 'date'],
            'suspended_at'=>[ 'date'],
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
            'name.required' => 'Please provide a name'           
        ];
    }

}
