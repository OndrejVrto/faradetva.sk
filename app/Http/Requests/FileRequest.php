<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        if (request()->routeIs('files.store')) {
            $fileRule = 'required';
        } else if (request()->routeIs('files.update')) {
            $fileRule = 'nullable';
        }
        return [
            'static_page_id' => [
                'required',
                'exists:static_pages,id'
            ],
            'file_type_id' => [
                'required',
                'exists:file_types,id'
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'author' => [
                'nullable',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ],
            'copywright' => [
                'nullable',
                'string',
                'max:255',
            ],
            'file' => [
                $fileRule,
                'file',
                'max:10000'
            ],
        ];
    }
}
