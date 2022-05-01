<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SingleWord implements Rule
{
    public function __construct() {
        //
    }

    public function passes($attribute, $value) {
        return is_string($value) && ! preg_match('/\s/u', $value);
    }

    public function message() {
        return 'Pole môže obsahovať len jediné slovo.';
    }
}
