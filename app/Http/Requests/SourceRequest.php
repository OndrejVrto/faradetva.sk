<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'description' => [
                'nullable',
                'string',
                'max:255',
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
}
