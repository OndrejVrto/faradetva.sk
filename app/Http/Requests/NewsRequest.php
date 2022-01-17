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
            'user_id' => [
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
                Rule::unique('news', 'slug')->ignore($this->news)->whereNull('deleted_at')
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
            'news_picture' => [
                $imageRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=848,min_height=460',
                'max:5000'
            ],
            'files.*' => [
                'file',
                'max:10000',
            ],
            // 'tags' => 'required',
        ];
    }

    public function messages() {
        return [
            'news_picture.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
            'unpublished_at.after' => 'Dátum a čas musí byť väčší ako je v poli: Publikovať Od',
        ];
    }

    protected function prepareForValidation() {
        $state = $this->active ? 1 : 0;

        $this->merge([
            'active' => $state,
            'user_id' => auth()->id(),
            'slug' => Str::slug($this->title),
        ]);

        is_null($this->published_at) ?: $this->merge(['published_at' => date('Y-m-d H:i:s' ,strtotime($this->published_at))]);
        is_null($this->unpublished_at) ?: $this->merge(['unpublished_at' => date('Y-m-d H:i:s' ,strtotime($this->unpublished_at))]);

        Session::put(['news_old_input_checkbox' => $state]);
    }
}
