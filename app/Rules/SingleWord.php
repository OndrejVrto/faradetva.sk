<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SingleWord implements Rule {
    public function __construct() {
        //
    }

    public function passes($attribute, $value): bool {
        return is_string($value) && ! preg_match('/\s/u', $value);
    }

    public function message(): string {
        return 'Pole môže obsahovať len jediné slovo.';
    }
}
