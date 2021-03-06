<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YCNXRequest extends FormRequest
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
            'khohang_id' => 'required|string|max:10',
            'ngaylay' => 'required|date',
            'thanhtien' => 'required|string|max:16',
            'loaiphieu' => 'required|string|max:100',
        ];
    }
}
