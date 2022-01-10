<?php

namespace App\Http\Requests;

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
            'url' => ['required','string'],
            'title' => ['required','string'],
            'description' => ['nullable','string'],
            'keywords' => ['nullable','string'],
            'author' => ['nullable','string'],
            'header' => ['nullable','string'],
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->whereNull('deleted_at'),
                'required',
                'string',
            ],
        ];

        // dd($rules);
        return $rules;
    }
}
