<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class TestimonialRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'active' => [
                'boolean',
                'required',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('testimonials', 'slug')->ignore($this->testimonial)->withoutTrashed(),
            ],
            'function' => [
                'nullable',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'photo' => [
                $this->requiredNullableRule(),
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=100,min_height=100',
                'max:2048',
            ],
        ];
    }

    public function messages(): array {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name.'-'.$this->function)
        ]);
    }
}
