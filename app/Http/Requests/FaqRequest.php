<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'question' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('faqs', 'slug')->ignore($this->faq),
            ],
            'answer' => [
                'required',
                'string',
                'max:1024',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->question)
        ]);
    }
}