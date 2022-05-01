<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use App\Enums\ChartType;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;

class ChartRequest extends BaseRequest
{
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
                new Enum(ChartType::class),
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
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
