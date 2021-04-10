<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'name' =>['string','required','max:255'],
            'slug' =>['string','required','max:255'],
            'status' =>['string','required','max:255'],
            'visibility' =>['string','required','max:255'],
            'type' =>['string','required','max:255'],
            'sku' =>['string','required', Rule::unique('products')->ignore($this->product)],
            'regular_price' =>['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'description' =>['string'],
            'summary' =>['string'],
            'sale_price' =>['regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'taxable' =>['integer'],
            'weight' =>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'length' =>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'width' =>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'height' =>[ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'purchase_note' =>['string'],
            'meta_title' =>['string'],
            'meta_description' =>['string'],
            'sell_button_text' =>['string','max:255'],
            'virtual' =>['integer'],
            'downloadable' =>['integer'],
            'sale_start_date' =>['date'],
            'sale_end_date' =>['date'],
            'publish_at' =>['date'],
            'deleted_at' =>['date'],
            'suspended_at' =>['date'],
            'featured_img' =>['string'],
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
            'name.required' => 'Please provide a product name',
        ];
    }

}
