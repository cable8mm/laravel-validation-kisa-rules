<?php

namespace Cable8mm\ValidationKisaRules\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class KisaPassword implements ValidationRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
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

        // Rule 3. The string must contain at least one **Special Character**.
        if (preg_match('/[!@#$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $value)) {
            $validatedCount++;
        }

        if ($validatedCount === 0) {
            $fail('The :attribute must follow password rules.')->translate();
        }

        // Condition 1:
        // If one rule is satisfied, the length of the string must be
        // between 10 and 20 characters (including 10 and 20).
        if ($validatedCount === 1 && ($valueLength < 10 || $valueLength > 20)) {
            $fail('The :attribute must follow password rules.')->translate();
        }

        // Condition 2:
        // If two or more rules are satisfied, the length of the string must be
        // between 8 and 20 characters (including 8 and 20).
        if ($validatedCount >= 2 && ($valueLength < 8 || $valueLength > 20)) {
            $fail('The :attribute must follow password rules.')->translate();
        }
    }
}
