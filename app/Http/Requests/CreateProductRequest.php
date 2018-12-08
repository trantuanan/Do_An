<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'size' => 'required|string|max:20',
            'baohanh' => 'required|numeric|max:100',
            'dongia' => 'required|numeric|max:99999999999999',
            'category_id' => 'required',
            'anh' => 'image'
        ];
    }
}
