<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderProduct extends FormRequest
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
            'product_id'=>['required',  'integer'],
            'order_id'=>['required',  'integer'],
            'product_name'=>['required', 'string'],
            'description'=>[ 'string'],
            'quantity'=>['required',  'integer'],
            'product_price'=>['required',  'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'discount_per_unit'=>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_discount_amount'=>['regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'discount_percentage'=>[ 'integer'],
            'price_per_unit'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_amount'=>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/']
        ];
    }
}
