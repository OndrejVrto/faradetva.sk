<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        if (request()->routeIs('testimonials.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('testimonials.update')) {
            $photoRule = 'nullable';
        }

        return [
            'active' => [
                'boolean'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'slug' => [
                Rule::unique('testimonials', 'slug')->ignore($this->testimonial)->whereNull('deleted_at')
            ],
            'function' => [
                'nullable',
                'string',
                'max:255'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=100,min_height=100',
                'max:2048'
            ],
        ];
    }

    public function messages() {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }

    protected function prepareForValidation() {
        $state = $this->active ? 1 : 0;

        $this->merge([
            'active' => $state,
            'slug' => Str::slug($this->name)
        ]);

        Session::put(['testimonial_old_input_checkbox' => $state]);
    }
}
