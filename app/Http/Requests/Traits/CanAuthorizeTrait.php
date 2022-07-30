<?php

declare(strict_types=1);

namespace App\Http\Requests\Traits;

trait CanAuthorizeTrait {
    public function authorize(): bool {
        return true;
    }
}
