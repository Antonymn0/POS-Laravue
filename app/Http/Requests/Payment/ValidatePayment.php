<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePayment extends FormRequest
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
            'order_id'=>['required', 'integer'],
            'method'=>['required', 'string'],
            'status'=>['required', 'string'],
            'currency'=>['required', 'string'],
            'shipping_cost'=>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_due'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_payable'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'discount_rate'=>['regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'discount_amount'=>['regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'payment_due_date'=>['required', 'date'],
            'interest_rate'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'account_ref'=>[ 'string'],
            'transaction_desc'=>[ 'string'],
            'phone_number'=>[ 'string'],
            'merchant_request_id'=>[ 'string'],
            'checkout_request_id'=>[ 'string'],
            'response_code'=>[ 'string'],
            'response_msg'=>[ 'string'],
            'coupon_code'=>[ 'string'],
            'deleted_at'=>[ 'date'],
            'suspended_at'=>[ 'date']
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
            'order_id.required' => 'order id field is required',           
            'method.required' => 'method field is required',           
            'status.required' => 'status field is required',           
            'currency.required' => 'curency field is required',          
            'shipping_cost.regex' => 'please use numbers only for shipping cost field'           
        ];
    }

}
