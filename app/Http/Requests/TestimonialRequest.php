<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasCropPictureFields;

class TestimonialRequest extends BaseRequest
{
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'active'      => $this->reqBoolRule(),
            'name'        => $this->reqStrRule(),
            'slug'        => Rule::unique('testimonials', 'slug')->ignore($this->testimonial)->withoutTrashed(),
            'function'    => $this->nullStrRule(),
            'description' => [
                'nullable',
                'string',
            ],
            // 'photo' => [
            //     'dimensions:min_width=100,min_height=100',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->name.'-'.$this->function)
        ]);
    }
}
