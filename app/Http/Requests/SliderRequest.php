<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('sliders.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('sliders.update')) {
            $photoRule = 'nullable';
        }

        return [
            'active' => [
                'boolean',
                'required'
            ],
            'heading_1' => [
                'nullable',
                'string',
                'max:255'
            ],
            'heading_2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'heading_3' => [
                'nullable',
                'string',
                'max:255'
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=800',
                'max:10000'
            ],
        ];
    }

    public function messages() {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }
}
