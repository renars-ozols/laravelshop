<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartQty extends FormRequest
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
            'qty' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'qty.required' => 'This field is required',
            'qty.min' => 'The quantity must be atleast 1'
        ];
    }
}
