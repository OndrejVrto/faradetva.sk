<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Rules\DateTimeAfterNow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('news.store')) {
            $imageRule = 'required';
        } else if (request()->routeIs('news.update')) {
            $imageRule = 'nullable';
        }

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
                'max:200',
            ],
            'slug' => [
                Rule::unique('news', 'slug')->ignore($this->news)->withoutTrashed(),
            ],
            'content' => [
                'required',
            ],
            'teaser' => [
                'required',
                'string',
                'max:500',
            ],
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'picture' => [
                $imageRule,
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

    public function messages() {
        return [
            'picture.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
            'unpublished_at.after' => 'Dátum a čas musí byť väčší ako je v poli: Publikovať Od',
            'content.required' => 'Nejaký obsah článku by mal byť. Napíš aspoň pár viet.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);

        is_null($this->published_at) ?: $this->merge(['published_at' => date('Y-m-d H:i:s' ,strtotime($this->published_at))]);
        is_null($this->unpublished_at) ?: $this->merge(['unpublished_at' => date('Y-m-d H:i:s' ,strtotime($this->unpublished_at))]);
    }
}
