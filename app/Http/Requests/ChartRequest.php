<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChartRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'active' => [
                'boolean',
                'required',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('charts', 'slug')->ignore($this->chart)->withoutTrashed(),
            ],
            'name_x_axis' => [
                'required',
                'string',
                'max:255',
            ],
            'name_y_axis' => [
                'required',
                'string',
                'max:255',
            ],
            'type_chart' => [
                'required',
                'integer',
                'between:1,255',
            ],
            'color' => [
                'required',
                'regex:/^(#(?:[0-9a-f]{2}){2,4}|#[0-9a-f]{3}|(?:rgba?|hsla?)\((?:\d+%?(?:deg|rad|grad|turn)?(?:,|\s)+){2,3}[\s\/]*[\d\.]+%?\))$/i',
                'max:10',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
