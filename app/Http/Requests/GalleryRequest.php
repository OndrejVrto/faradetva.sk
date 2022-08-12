<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\Traits\HasSourceFields;

class GalleryRequest extends BaseRequest {
    use HasSourceFields;

    public function rules(): array {
        return [
            'title'     => $this->reqStrRule(),
            'slug'      => Rule::unique('galleries', 'slug')->ignore($this->gallery),
            'picture.*' => [
                $this->requireORnullable(),
                'max:10000'
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
