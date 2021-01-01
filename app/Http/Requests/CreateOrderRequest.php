<?php

namespace App\Http\Requests;

use App\Rules\CheckEnoughMoney;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'link' => 'required|max:255',
            'number_up' => [
                'required',
                'numeric',
                'max:100000',
                'min:1',
                new CheckEnoughMoney($this->id_service)
            ],
            'content' => 'nullable',
            'note' => 'nullable',
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
            'consent' => __('consent'),
            'name' => __('Name'),
            'company_name' => __('Company'),
            'postal_code' => __('Postal Code'),
            'country' => __('Country'),
            'address' => __('Street Address'),
            'email' => __('Mail Address'),
            'phone_number' => __('Phone Number'),
            'birthday' => __('Date of birth'),
            'title' => __('title'),
            'status' => __('Status'),
            'sns_account' => __('Homepage・SNS Account'),
            'credit_card' => __('Credit card'),
            'card_number' => __('Card number'),
            'card_name' => __('Card holder name'),
            'expired_date' => __('Expiry date')
        ];
    }
}
