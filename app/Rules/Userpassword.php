<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Userpassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if (!empty($value)) {
            $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if(preg_match($partten ,$value, $matchs)){
                return true;
            }
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mật khẩu bắt đầu bằng chữ in hoa ';
    }
}
