<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'mail_address' => 'required|string|email|unique:users,mail_address|max:100',
            'password' => 'required|string|max:20',
            'password_confirmation' => 'required_with|same:password',
            'name' => 'required|max:255',
            'address' => 'max:255',
            'phone' => array('string','regex:/(^([0-9]+)?$)/u','max:15' ),
            'ngaysinh' => 'required|date',
            'cmnd' => 'max:20',
        ];
    }
}
