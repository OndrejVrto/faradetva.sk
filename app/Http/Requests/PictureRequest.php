<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\SourceRequest;

class PictureRequest extends SourceRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('pictures.store')) {
            $photoRule = 'required';
        } else if (request()->routeIs('pictures.update')) {
            $photoRule = 'nullable';
        }

        return parent::rules() + [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('pictures', 'slug')->ignore($this->picture),
            ],
            'photo' => [
                $photoRule,
                'file',
                'mimes:jpg,bmp,png,jpeg,svg,tif',
                'max:10000',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
