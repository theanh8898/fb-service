<?php

namespace App\Http\Requests;

use App\Rules\CheckEnoughMoney;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'code_type' => 'required|max:255',
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'number_of_price' => 'required|numeric|min:1',
        ];
    }

    /**
     * Change name attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'code_type' => 'Mã dịch vụ',
            'name' => 'Tên dịch vụ',
            'price' => 'Giá dịch vụ',
            'number_of_price' => 'Số lượng tương ứng với giá',
        ];
    }
}
