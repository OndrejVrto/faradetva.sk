<?php

namespace App\Http\Requests\Traits;

trait CanAuthorizeTrait
{
    public function authorize(): bool {
        return true;
    }
}
