<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriestRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('priests.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('priests.update')) {
            $photoRule = 'nullable';
        }

        return [
            'active' => [
                'boolean',
                'required',
            ],
            'titles_before' => [
                'nullable',
                'string',
                'max:255',
            ],
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'titles_after' => [
                'nullable',
                'string',
                'max:255',
            ],
            'function' => [
                'nullable',
                'string',
                'max:255',
            ],
            'phone' => [
                'nullable',
                'regex:/[\d\+\-\ ]+/',
            ],
            'email' => [
                'nullable',
                'string',
                'email:rfc,dns,filter',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=230,min_height=270',
                'max:2048',
            ],
        ];
    }

    public function messages() {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }
}

