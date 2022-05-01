<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class PictureRequest extends BaseRequest
{
    use HasSourceFields;
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'title' => $this->reqStrRule(),
            'slug'  => Rule::unique('pictures', 'slug')->ignore($this->picture),
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
