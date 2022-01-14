<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

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
            'active' => 'boolean',
            'name' => 'required|string|max:255',
            'function' => 'nullable|string|max:255',
            'description' => 'nullable|string',
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
        ]);

        Session::put(['testimonial_old_input_checkbox' => $state]);
    }
}
