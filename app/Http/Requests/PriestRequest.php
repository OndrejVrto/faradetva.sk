<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class PriestRequest extends BaseRequest
{
    public function rules(): array {
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
                $this->requiredNullableRule(),
                'file',
                'mimes:jpg,bmp,png,jpeg,svg',
                'dimensions:min_width=230,min_height=270',
                'max:2048',
            ],
        ];
    }

    public function messages(): array {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }
}

