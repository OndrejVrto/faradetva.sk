<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;

class PrayerRequest extends BaseRequest
{
    use HasSourceFields;

    public function rules(): array {
        return [
            'active' => [
                'boolean',
                'required'
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                Rule::unique('prayers', 'slug')->ignore($this->prayer)->withoutTrashed(),
            ],
            'quote_row1' => [
                'required',
                'string',
                'max:255'
            ],
            'quote_row2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'quote_author' => [
                'nullable',
                'string',
                'max:255'
            ],
            'quote_link_url' => [
                'required_with:quote_link_text',
                'nullable',
                'url',
                'string',
                'max:512'
            ],
            'quote_link_text' => [
                'required_with:quote_link_url',
                'nullable',
                'string',
                'max:255'
            ],
            'photo' => [
                $this->requiredNullableRule(),
                'file',
                'mimes:jpg,bmp,png,jpeg',
                'dimensions:min_width=1920,min_height=800',
                'max:10000'
            ],
        ];
    }

    public function messages(): array {
        return [
            'photo.dimensions' => 'Obrázok musí byť minimálne :min_width px široký a :min_height px vysoký.',
            'quote_link_url.required_with' => 'Musí byť vyplnené vždy, keď je vyplnené pole "Text tlačítka".',
            'quote_link_text.required_with' => 'Musí byť vyplnené vždy, keď je vyplnené pole "Link tlačítka (url)".',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
