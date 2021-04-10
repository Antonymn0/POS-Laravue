<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValidateLogin extends FormRequest
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
            'Username'=>['nullable', 'string', 'max:255' ],
            'phone'=>['nullable', 'string'],
            'email'=>['nullable', 'string','max:255'],
            'password' => ['required','min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/','max:255']
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
            'emailOrPhoneOrUsername.required' => 'Please user either Email or Phone or Username to login.',          
            'password.required' => 'Password field is required'           
        ];
    }

}
