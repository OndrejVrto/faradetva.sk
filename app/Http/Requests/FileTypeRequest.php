<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FileTypeRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('file_types', 'name')->ignore($this->file_type),
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ]
        ];
    }
}
