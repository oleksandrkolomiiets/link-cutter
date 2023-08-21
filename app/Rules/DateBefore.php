<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBefore implements ValidationRule
{
    public function __construct(protected Carbon $dateTimeBefore) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Carbon::parse($value)->isAfter($this->dateTimeBefore)) {
            $fail('The :attribute is later than expected.');
        }
    }
}
