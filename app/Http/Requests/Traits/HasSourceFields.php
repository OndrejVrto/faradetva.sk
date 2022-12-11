<?php declare(strict_types=1);

namespace App\Http\Requests\Traits;

trait HasSourceFields {
    /**
     * @return array{source_description: mixed, source_author: mixed, source_author_url: mixed, source_source: mixed, source_source_url: mixed, source_license: mixed, source_license_url: mixed}
     */
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
