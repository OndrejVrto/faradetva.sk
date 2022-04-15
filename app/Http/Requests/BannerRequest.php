<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\SourceRequest;

class BannerRequest extends SourceRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('banners.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('banners.update')) {
            $photoRule = 'nullable';
        }

        return parent::rules() + [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('banners', 'slug')->ignore($this->banner),
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=480',
                'max:5000',
            ],
        ];
    }

    public function messages() {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug' => Str::slug($this->title)
        ]);
    }
}
