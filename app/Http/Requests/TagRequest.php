<?php

namespace App\Http\Requests;

use App\Rules\SingleWord;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => [
                'required',
                new SingleWord,
                'max:30',
                'alpha',
            ],
            'slug' => [
                Rule::unique('tags', 'slug')->ignore($this->tag)->whereNull('deleted_at')
            ],
            'description' => [
                'required',
                'max:100'
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
