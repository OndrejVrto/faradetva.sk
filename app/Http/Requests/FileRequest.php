<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\SourceRequest;

class FileRequest extends SourceRequest
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

        return parent::rules() + [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('files', 'slug')->ignore($this->file),
            ],
            'attachment' => [
                $fileRule,
                'file',
                'max:10000'
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
