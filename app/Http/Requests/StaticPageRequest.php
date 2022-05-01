<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class StaticPageRequest extends BaseRequest
{
    use HasSourceFields;
    use HasCropPictureFields;

    public function rules(): array {
        return  [
            'title'            => $this->reqStrRule(),
            'slug'             => Rule::unique('static_pages', 'slug')->ignore($this->static_page)->withoutTrashed(),
            'url'              => $this->reqStrRule(),
            'description_page' => $this->reqStrRule(),
            'keywords'         => $this->reqStrRule(),
            'author_page'      => $this->nullStrRule(),
            'header'           => $this->reqStrRule(),
            'teaser'           => $this->reqStrRule(),
            'wikipedia'        => $this->nullUrlRule(),
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->withoutTrashed(),
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug(Str::replace('/','-',$this->url))
        ]);
    }
}
