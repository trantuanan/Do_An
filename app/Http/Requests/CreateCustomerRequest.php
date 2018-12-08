<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'address' => 'max:255',
            'phone' => array('string','regex:/(^([0-9]+)?$)/u','max:15' ),
            'ngaysinh' => 'required|date',
            'mail_address' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|max:20|confirmed',
        ];
    }
}
