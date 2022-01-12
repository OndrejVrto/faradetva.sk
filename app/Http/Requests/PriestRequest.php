<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class PriestRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('priests.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('priests.update')) {
            $photoRule = 'sometimes|nullable';
        }

        return [
            'active' => 'boolean',
            'titles_before' => 'nullable|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'titles_after' => 'nullable|string|max:255',
            'function' => 'nullable|string|max:255',
            'phone' => 'nullable|regex:/[\d\+\-\ ]+/',
            'description' => 'required|string',
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

    protected function prepareForValidation() {
        $state = $this->active ? 1 : 0;

        $this->merge([
            'active' => $state,
        ]);

        Session::put(['priest_old_input_checkbox' => $state]);
    }
}
