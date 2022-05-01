<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Rules\DateTimeAfterNow;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;

class NewsRequest extends BaseRequest
{
    use HasSourceFields;

    public function rules(): array {
        return [
            'active' => [
                'boolean',
                'required'
            ],
            'published_at' => [
                'nullable',
                'date',
                new DateTimeAfterNow($this->timezone),
            ],
            'unpublished_at' => [
                'nullable',
                'date',
                'after:published_at',
                new DateTimeAfterNow($this->timezone),
            ],
            'title' => [
                'required',
                'string',
                'max:110', //Google schema markup:  ... Headlines should not exceed 110 characters. ...
            ],
            'slug' => [
                Rule::unique('news', 'slug')->ignore($this->news)->withoutTrashed(),
            ],
            'content' => [
                'required',
            ],
            'teaser' => [
                'nullable',
                'string',
                'max:500',
            ],
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'picture' => [
                $this->requiredNullableRule(),
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=848,min_height=460',
                'max:5000'
            ],
            'doc.*' => [
                'nullable',
            ],
            // 'tags' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'picture.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
            'unpublished_at.after' => 'Dátum a čas musí byť väčší ako je v poli: Publikovať Od',
            'content.required' => 'Nejaký obsah článku by mal byť. Napíš aspoň pár viet.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)

        ]);

        is_null($this->published_at) ?: $this->merge(['published_at' => date('Y-m-d H:i:s', strtotime($this->published_at))]);
        is_null($this->unpublished_at) ?: $this->merge(['unpublished_at' => date('Y-m-d H:i:s', strtotime($this->unpublished_at))]);
    }
}
