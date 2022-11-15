<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsBase64Encoded implements Rule {
    // $value must be base64 string
    public function passes($attribute, mixed $value): bool {
        $s = explode(";base64,", strval($value))[1] ?? strval($value);

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
        return base64_encode($decoded) === $s;
    }

    public function message(): string|array {
        return 'Vkladaný obrázok musí byť vo formáte base64.';
    }
}
