<?php

namespace App\Http\Requests;

use App\Rules\CheckEnoughMoney;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name,'.$this->user->id,
            'email' => 'required|email',
            'amount' => 'nullable|numeric|min:0',
            'phone' => 'required|numeric'
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
            'email' => 'Email',
            'name' => 'Tên',
            'phone' => 'Số điện thoại',
            'amount' => 'Số tiền',
        ];
    }
}
