<?php

namespace App\ValidationRules;

use Illuminate\Contracts\Validation\Rule;

class MyJsonValidation implements Rule
{
    /**
     * Store message here so it may be used in the output.
     *
     * @var type
     */
    private $decode_error_message = "";

    /**
     * Determine if the validation rule passes.
     *
     * @param type $attribute
     * @param type $value
     * @return type
     */
    public function passes($attribute, $value)
    {
        $val = json_decode($value, true);
        if(! is_array($val)) {
            $this->decode_error_message = json_last_error_msg();
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
        return 'The :attribute could not be decoded into JSON!';
    }
}