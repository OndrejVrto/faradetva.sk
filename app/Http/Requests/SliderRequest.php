<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;

class SliderRequest extends BaseRequest
{
    use HasSourceFields;

    public function rules(): array {
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
                $this->requiredNullableRule(),
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=800',
                'max:10000'
            ],
        ];
    }

    public function messages(): array {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }
}
