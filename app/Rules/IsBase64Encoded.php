<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsBase64Encoded implements Rule {
    public function __construct() {
        //
    }

    // $value must be base64 string
    public function passes($attribute, $value) {
        $s = explode(";base64,", $value)[1] ?? $value;

        // Check if there are valid base64 characters
        if (! preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) {
            return false;
        }

        // Decode the string in strict mode and check the results
        $decoded = base64_decode($s, true);
        if (! $decoded) {
            return false;
        }

        // Encode the string again
        if (base64_encode($decoded) != $s) {
            return false;
        }

        return true;
    }

    public function message() {
        return 'Vkladaný obrázok musí byť vo formáte base64.';
    }
}
