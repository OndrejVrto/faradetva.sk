<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\Traits\HasCropPictureFields;

class TestimonialRequest extends BaseRequest {
    use HasCropPictureFields;

    /**
     * @return array{active: mixed[], name: mixed[], slug: \Illuminate\Validation\Rules\Unique, function: mixed[], url: mixed[], description: string[]}
     */
    public function rules(): array {
        return [
            'active'      => $this->reqBoolRule(),
            'name'        => $this->reqStrRule(),
            'slug'        => Rule::unique('testimonials', 'slug')->ignore($this->testimonial)->withoutTrashed(),
            'function'    => $this->nullStrRule(),
            'url'         => $this->nullUrlRule(),
            'description' => [
                'nullable',
                'string',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name.'-'.$this->function)
        ]);
    }
}
