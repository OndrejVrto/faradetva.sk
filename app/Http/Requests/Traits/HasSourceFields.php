<?php

namespace App\Http\Requests\Traits;

trait HasSourceFields
{
    protected function sourceRules(): array {
        return [
            'description' => $this->reqStrRule(420),
            'author'      => $this->nullStrRule(),
            'author_url'  => $this->nullUrlRule(),
            'source'      => $this->nullStrRule(),
            'source_url'  => $this->nullUrlRule(),
            'license'     => $this->nullStrRule(),
            'license_url' => $this->nullUrlRule(),
        ];
    }

    // public function sourceMessages(): array {
    //     return [];
    // }
}
