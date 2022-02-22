<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class PictureRequest extends FormRequest
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

        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('pictures', 'slug')->ignore($this->picture)->withoutTrashed(),
            ],
            'author' => [
                'nullable',
                'string',
                'max:255',
            ],
            'author_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'source' => [
                'nullable',
                'string',
                'max:255',
            ],
            'source_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
            ],
            'license' => [
                'nullable',
                'string',
                'max:255',
            ],
            'license_url' => [
                'nullable',
                'url',
                'string',
                'max:512',
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
        $state = $this->active ? 1 : 0;

        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
