<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaticPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->withoutTrashed(),
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('static_pages', 'slug')->ignore($this->static_page)->withoutTrashed(),
            ],
            'url' => [
                'required',
                'string',
                'max:255'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'nullable',
                'string',
                'max:255'
            ],
            'keywords' => [
                'nullable',
                'string',
                'max:255'
            ],
            'author' => [
                'nullable',
                'string',
                'max:255'
            ],
            'header' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
        return $rules;
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug(Str::replace('/','-',$this->url))
        ]);
    }
}
