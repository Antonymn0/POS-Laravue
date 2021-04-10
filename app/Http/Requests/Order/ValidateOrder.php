<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrder extends FormRequest
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
            'customer_id'=> ['required', 'integer'],
            'cashier_id'=> ['required', 'integer'],
            'reference'=> ['required', 'string'],
            'status'=> ['required', 'string'],
            'type'=> [ 'string'],
            'deleted_at'=> [ 'date'],
            'suspended_at'=> ['date']
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
            'customer_id.required' => 'customer id field is required',           
            'cashier_id.required' => 'cashier id field is required',           
            'reference.required' => 'referencefield is required'           
        ];
    }

}
