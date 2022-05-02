<?php

namespace App\Http\Requests\Traits;

trait HasSourceFields
{
    protected function sourceRules(): array {
        return [
            'source_description' => $this->reqStrRule(420),
            'source_author'      => $this->nullStrRule(),
            'source_author_url'  => $this->nullUrlRule(),
            'source_source'      => $this->nullStrRule(),
            'source_source_url'  => $this->nullUrlRule(),
            'source_license'     => $this->nullStrRule(),
            'source_license_url' => $this->nullUrlRule(),
        ];
    }

    // public function sourceMessages(): array {
    //     return [];
    // }
}
