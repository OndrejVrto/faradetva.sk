<?php

namespace App\Http\Requests;

use App\Rules\SingleWord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::unique('tags', 'title')->ignore($this->tag)->whereNull('deleted_at')
            ],
            'description' => 'required|max:255'
        ];
    }
}
