<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'title' => [
                'required',
                'max:30',
            ],
            'slug' => [
                Rule::unique('categories', 'slug')->ignore($this->category)->withoutTrashed(),
            ],
            'description' => [
                'required',
                'max:255',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
