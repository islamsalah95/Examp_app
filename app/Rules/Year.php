<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Year implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $currentYear = date('Y'); // Get the current year

        if (!is_numeric($value) || (int)$value < 1900 || (int)$value > $currentYear) {
            $fail("The {$attribute} must be a valid year between 1900 and {$currentYear}.");
        }
    }
}
