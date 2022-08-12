<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class PrayerRequest extends BaseRequest {
    use HasSourceFields;
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'active'       => $this->reqBoolRule(),
            'name'         => $this->reqStrRule(),
            'title'        => $this->nullStrRule(),
            'slug'         => Rule::unique('prayers', 'slug')->ignore($this->prayer)->withoutTrashed(),
            'quote_row1'   => $this->reqStrRule(),
            'quote_row2'   => $this->nullStrRule(),
            'quote_author' => $this->nullStrRule(),
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
        ];
    }

    public function messages(): array {
        return [
            'quote_link_url.required_with' => 'Musí byť vyplnené vždy, keď je vyplnené pole "Text tlačítka".',
            'quote_link_text.required_with' => 'Musí byť vyplnené vždy, keď je vyplnené pole "Link tlačítka (url)".',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->name)
        ]);
    }
}
