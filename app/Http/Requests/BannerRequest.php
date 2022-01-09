<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        if (request()->routeIs('banners.store')) {
            $photoRule = 'required';
        } elseif (request()->routeIs('banners.update')) {
            $photoRule = 'sometimes|nullable';
        }

        return [
            'active' => 'boolean|required',
            'title' => 'required|string|max:255',
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=480',
                'max:10000'
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

        Session::put(['banner_old_input_checkbox' => $state]);
    }
}
