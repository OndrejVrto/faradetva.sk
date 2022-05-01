<?php

namespace App\Http\Requests;

use App\Rules\SingleWord;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class TagRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'title' => [
                'required',
                new SingleWord,
                'max:30',
                'alpha',
            ],
            'slug' => [
                Rule::unique('tags', 'slug')->ignore($this->tag)->withoutTrashed(),
            ],
            'description' => [
                'required',
                'max:100'
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
