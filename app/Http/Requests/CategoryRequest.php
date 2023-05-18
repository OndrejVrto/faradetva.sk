<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends BaseRequest {
    /**
     * @return array{title: string[], slug: \Illuminate\Validation\Rules\Unique, description: mixed[]}
     */
    public function rules(): array {
        return [
            'title' => [
                'required',
                'max:30',
            ],
            'slug'        => Rule::unique('categories', 'slug')->ignore($this->category)->withoutTrashed(),
            'description' => $this->reqStrRule(),
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
