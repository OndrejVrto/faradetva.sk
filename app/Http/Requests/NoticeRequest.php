<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Rules\DateTimeAfterNow;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $modelName = Str::replace('-', '_', collect($this->route()->getController())->toArray()["\x00*\x00resource"]);
        // dd(Rule::unique('notices', 'slug')->ignore($this->{$modelName})->withoutTrashed(),);
        return [
            'active' => [
                'boolean',
                'required'
            ],
            'published_at' => [
                'nullable',
                'date',
                new DateTimeAfterNow($this->timezone),
            ],
            'unpublished_at' => [
                'nullable',
                'date',
                'after:published_at',
                new DateTimeAfterNow($this->timezone),
            ],
            'title' => [
                'required',
                'string',
                'max:200',
            ],
            'notice_file' => [
                'file',
                'mimes:pdf',
                'max:10000',
            ],
            'slug' => [
                Rule::unique('notices', 'slug')->ignore($this->{$modelName})->withoutTrashed(),
            ],
        ];
    }

    public function messages() {
        return [
            'slug.unique' => 'Takýto nadpis už existuje medzi farskými oznamami alebo medzi rozpismi lektorov/akolytov. Zvoľ iný.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);

        is_null($this->published_at) ?: $this->merge(['published_at' => date('Y-m-d H:i:s', strtotime($this->published_at))]);
        is_null($this->unpublished_at) ?: $this->merge(['unpublished_at' => date('Y-m-d H:i:s', strtotime($this->unpublished_at))]);
    }
}
