<?php

namespace Cable8mm\ValidationKisaRules\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class KisaPassword implements ValidationRule
{
    /**
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $length = strlen($value);

        $types = [
            preg_match('/[a-zA-Z]/', $value),
            preg_match('/\d/', $value),
            preg_match('/[!@#$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $value),
        ];

        $count = count(array_filter($types));

        if ($count === 0) {
            $fail('The :attribute must follow password rules.')->translate();

            return;
        }

        $minimum = $count === 1 ? 10 : 8;

        if ($length < $minimum || $length > 20) {
            $fail('The :attribute must follow password rules.')->translate();
        }
    }
}
