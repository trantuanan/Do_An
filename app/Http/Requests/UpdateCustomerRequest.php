<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'password_1' => 'min:6|max:20',
            'password_confirmation' => 'required_with|same:password_1',
            'address' => 'max:255',
            'phone' => 'max:15',
            'ngaysinh' => 'required|date',
        ];
    }
}
