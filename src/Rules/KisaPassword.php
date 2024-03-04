<?php

namespace Cable8mm\ValidationKisaRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class KisaPassword implements Rule
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
        $valueLength = strlen($value);
        $validatedCount = 0;

        // 문자 1개 이상
        if (preg_match('/[a-zA-Z]/', $value)) {
            $validatedCount++;
        }

        // 숫자 1개 이상
        if (preg_match('/\d/', $value)) {
            $validatedCount++;
        }

        // 특수 문자 1개 이상
        if (preg_match('/[!@#$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $value)) {
            $validatedCount++;
        }

        if ($validatedCount === 0) {
            return false;
        }

        // 1가지 이상 10자-20자
        if ($validatedCount === 1 && ($valueLength < 10 || $valueLength > 20)) {
            return false;
        }

        // 2가지 이상 8자-20자
        if ($validatedCount >= 2 && ($valueLength < 8 || $valueLength > 20)) {
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
        return __('The :attribute must follow password rules.');
    }
}
