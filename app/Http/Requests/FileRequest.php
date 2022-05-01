<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;

class FileRequest extends BaseRequest
{
    use HasSourceFields;

    public function rules(): array {
        return [
            'title'      => $this->reqStrRule(),
            'slug'       => Rule::unique('files', 'slug')->ignore($this->file),
            'attachment' => [
                $this->requireORnullable(),
                'file',
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
