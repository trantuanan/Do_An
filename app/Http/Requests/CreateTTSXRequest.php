<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTTSXRequest extends FormRequest
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
            'users_id' => 'required|string|max:10',
            'product_id' => 'required|string|max:10',
            'users_id' => 'required|string|max:10',
            'soluong' => 'required|string|max:4',
            'ngaybd' => 'required|date',
            'ngayht' => 'required|date',
        ];
    }
}
