<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\SourceRequest;

class StaticPageRequest extends SourceRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        if (request()->routeIs('static-pages.store')) {
            $pictureRule = 'required';
        } else if (request()->routeIs('static-pages.update')) {
            $pictureRule = 'nullable';
        }

        return parent::rules() + [
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->withoutTrashed(),
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('static_pages', 'slug')->ignore($this->static_page)->withoutTrashed(),
            ],
            'url' => [
                'required',
                'string',
                'max:255'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description_page' => [
                'nullable',   //TODO: change to required
                'string',
                'max:255'
            ],
            'keywords' => [
                'nullable',  //TODO: change to required
                'string',
                'max:255'
            ],
            'author_page' => [
                'nullable',
                'string',
                'max:255'
            ],
            'header' => [
                'required',
                'string',
                'max:255'
            ],
            'teaser' => [
                'nullable',  //TODO: change to required
                'string',
                'max:512'
            ],
            'wikipedia' => [
                'nullable',
                'string',
                'url',
                'max:512'
            ],
            'picture' => [
                $pictureRule,
                'file',
                'mimes:jpg,gif,png,jpeg',
                'dimensions:min_width=960,min_height=480',
                'max:2048',
            ]
            // 'banner' => [
            //     'required'
            // ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug(Str::replace('/','-',$this->url))
        ]);
    }
}
