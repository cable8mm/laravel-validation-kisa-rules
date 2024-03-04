<?php

namespace Cable8mm\ValidationKisaRules\Rules;

use Illuminate\Contracts\Validation\Rule;

class KisaPassword implements Rule
{
    protected string $attribute;

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
        $this->attribute = $attribute;

        $valueLength = strlen($value);
        $validatedCount = 0;

        // Rule 1. The string must contain at least one character.
        if (preg_match('/[a-zA-Z]/', $value)) {
            $validatedCount++;
        }

        // Rule 2. The string must contain at least one digit.
        if (preg_match('/\d/', $value)) {
            $validatedCount++;
        }

        // Rule 3. The string must contain at least one SPECIAL CHRACTER.
        if (preg_match('/[!@#$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $value)) {
            $validatedCount++;
        }

        if ($validatedCount === 0) {
            return false;
        }

        // Condition 1:
        // If one rule is satisfied, the length of the string must be
        // between 10 and 20 characters (including 10 and 20).
        if ($validatedCount === 1 && ($valueLength < 10 || $valueLength > 20)) {
            return false;
        }

        // Condition 2:
        // If two or more rules are satisfied, the length of the string must be
        // between 8 and 20 characters (including 8 and 20).
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
        return __('validationKisaRules::messages', [
            'attribute' => $this->attribute,
        ]);
    }
}
