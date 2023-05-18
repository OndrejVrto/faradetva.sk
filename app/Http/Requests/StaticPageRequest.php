<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\PageType;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class StaticPageRequest extends BaseRequest {
    use HasSourceFields;
    use HasCropPictureFields;

    /**
     * @return array{active: mixed[], virtual: mixed[], title: mixed[], slug: \Illuminate\Validation\Rules\Unique, url: mixed[], description_page: mixed[], keywords: mixed[], author_page: mixed[], header: mixed[], teaser: mixed[], wikipedia: mixed[], route_name: \Illuminate\Validation\Rules\Unique[]|string[], type_page: \Illuminate\Validation\Rules\Enum[]|string[]}
     */
    public function rules(): array {
        return  [
            'active'           => $this->reqBoolRule(),
            'virtual'          => $this->reqBoolRule(),
            'title'            => $this->reqStrRule(),
            'slug'             => Rule::unique('static_pages', 'slug')->ignore($this->static_page)->withoutTrashed(),
            'url'              => $this->reqStrRule(),
            'description_page' => $this->reqStrRule(),
            'keywords'         => $this->reqStrRule(),
            'author_page'      => $this->nullStrRule(),
            'header'           => $this->reqStrRule(),
            'teaser'           => $this->reqStrRule(512),
            'wikipedia'        => $this->nullUrlRule(512),
            'route_name' => [
                Rule::unique('static_pages', 'route_name')->ignore($this->static_page)->withoutTrashed(),
                'required',
                'string',
                'max:255',
            ],
            'type_page'  => [
                'required',
                new Enum(PageType::class),
            ],
        ];
    }

    protected function prepareForValidation() {
        $slug = Str::slug(Str::replace('/', '-', $this->url));
        $this->merge([
            'slug' => empty($slug) ? Str::slug($this->title) : $slug
        ]);
    }
}
