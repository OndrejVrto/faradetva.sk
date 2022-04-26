<?php

namespace App\Overrides;

use Illuminate\Support\Arr;
use Artesaos\SEOTools\JsonLd;

class CustomJsonLd extends JsonLd
{
    public function getValues(): array {
        return $this->values;
    }

    public function getValue(string $value): null|array|string {
        return $this->values[$value];
    }

    public function hasValue(string $value): bool {
        return (Arr::exists($this->values, $value)) ? true : false ;
    }
}
