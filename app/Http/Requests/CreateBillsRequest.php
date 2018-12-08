<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateBillsRequest extends FormRequest
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
            'customer_id' => 'required|string|max:10',
            'ngayht' => 'required|date|after:'.Carbon::now(),
            'ngaytra' => 'required|date|after:'.Carbon::now(),
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'thanhtien' => 'required|min:0|max:9999999999999',
            'thue' => 'required|numeric|max:100|min:0',
        ];
    }
}
