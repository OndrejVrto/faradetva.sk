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
            'url' => ['required','string','max:255'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'keywords' => ['nullable','string','max:255'],
            'author' => ['nullable','string','max:255'],
            'header' => ['nullable','string','max:255'],
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->whereNull('deleted_at'),
                'required',
                'string',
                'max:255',
            ],
        ];
        return $rules;
    }
}
