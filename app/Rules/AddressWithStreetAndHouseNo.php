<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AddressWithStreetAndHouseNo implements Rule
{
    /**
     * Error message
     *
     * @var $message
     */
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->message = 'The :attribute is invalid.';
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
        if($value && count(preg_split('/( |,)/', $value)) < 2){
            $this->message = 'The :attribute must contain minimum two word.';
            return false;
        }

        $words = preg_split('/( |,)/', $value);
        $houseNo = rtrim(array_pop($words), '.');

        if(! is_numeric ($houseNo)) {
            $this->message = 'The :attribute does not contain house number. It should be like "street, house no"';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
