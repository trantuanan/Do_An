<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateWarrantyRequest extends FormRequest
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
            'invoices_id' => 'required|numeric',
            'users_id' => 'required|numeric',
            'ngaybh' => 'required|date',
            'ngaytra' => 'required|date',
            'phuchi' => 'required|numeric|max:99999999999999',
            'trangthai' => 'required|numeric'
        ];
    }
}
