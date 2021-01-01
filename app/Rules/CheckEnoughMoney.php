<?php

namespace App\Rules;

use App\Models\Service;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CheckEnoughMoney implements Rule
{
    private $id_service;

    /**
     * Create a new rule instance.
     *
     * @param $id_service
     */
    public function __construct($id_service)
    {
        $this->id_service = $id_service;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $service = Service::find($this->id_service);

        return Auth::user()->amount > ($service->price/$service->number_of_price*$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ko du tien roi. Nap them di ban oi!';
    }
}
