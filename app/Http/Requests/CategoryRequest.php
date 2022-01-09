<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title' => [
                'required',
                'max:30',
                Rule::unique('categories', 'title')->ignore($this->category)->whereNull('deleted_at')
            ],
            'description' => 'required|max:255'
        ];
    }
}
