<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class FaqRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'question' => $this->reqStrRule(),
            'slug'     => Rule::unique('faqs', 'slug')->ignore($this->faq),
            'answer'   => $this->reqStrRule(65535),
            'order'    => [
                'nullable',
                'integer',
                'max:100',
                'min:-100',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->question)
        ]);
    }
}
