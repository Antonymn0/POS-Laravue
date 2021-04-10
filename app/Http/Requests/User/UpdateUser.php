<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            
            'first_name'=>['required', 'string','max:255'],
            'middle_name'=>['string','max:255'],
            'last_name'=>['required', 'string','max:255'],
            'user_name'=>['string','max:255',  Rule::unique('users')->ignore($this->user) ],
            'email'=>['required', 'string','max:255', 'email', Rule::unique('users')->ignore($this->user)],
            'phone'=>['required', 'string', Rule::unique('users')->ignore($this->user)],
            'address'=>['string','max:255'],
            'biography'=>['string', 'max:255'],
            'id_number'=> [ 'integer', Rule::unique('users')->ignore($this->user)],
            'passport_no'=> [ 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'dob'=> ['date'],
            'city'=> ['string', 'max:255'],
            'postal_code'=> ['string', 'max:255'],
            'physical_address'=> ['string', 'max:255'],
            'suspended_at'=> ['date'],
            'email_verified_at'=> ['date'],
            'id_verified_at'=> ['date'],
            'gender'=> ['integer'],
            'marital_status'=> ['integer'],
            'kra_pin'=> [ 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'nhif_no'=> ['string', 'max:255', Rule::unique('users')->ignore($this->user) ],
            'nssf_no'=> [ 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'job_id'=> [ 'string', 'max:255'],
            'nationality'=> ['string', 'max:255'],
            'employment_date'=> ['date'],
            'termination_date'=> ['date'],
            'approved_by'=> ['integer'],
            'supervisor_id'=> ['integer'],
            'registered_by'=> ['integer'],
            'suspended_by'=> ['integer'],
            'avatar'=> ['string', 'max:255']
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
            'email.required' => 'Please provide a valid email address',
            'phone.required' => 'Please provide your phone number',
        ];
    }
}
