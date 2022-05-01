<?php

namespace App\Http\Requests\Traits;

trait HasSourceFields
{
    protected function sourceRules(): array {
        return [
            'description' => [
                'required',
                'string',
                'max:420',
            ],

            'author' => [
                'nullable',
                'string',
                'max:255',
            ],
            'author_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'source' => [
                'nullable',
                'string',
                'max:255',
            ],
            'source_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'license' => [
                'nullable',
                'string',
                'max:255',
            ],
            'license_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
        ];
    }

    // public function sourceMessages(): array {
    //     return [];
    // }
}
