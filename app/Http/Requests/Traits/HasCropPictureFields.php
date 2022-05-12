<?php

namespace App\Http\Requests\Traits;

use App\Rules\IsBase64Encoded;

trait HasCropPictureFields
{
    protected function cropPictureRules(): array {
        return [
            'crop_file_name' => [
                $this->requireORnullable(),
                'string',
            ],
            'crop_base64_output' => [
                $this->requireORnullable(),
                'string',
                new IsBase64Encoded(),
            ],
            'crop_exact_dimensions' => [
                'boolean',
                'nullable',
            ],
            'crop_width' => [
                'nullable',
                'required_if:crop_exact_dimensions,1',
                'integer',
                'min:50',
                'max:2600',
            ],
            'crop_height' => [
                'nullable',
                'required_if:crop_exact_dimensions,1',
                'integer',
                'min:50',
                'max:2600',
            ],
        ];
    }

    public function cropPictureMessages(): array {
        return [
            'crop_base64_output.required' => 'Nejaký obrázok musí byť vložený.',
            'crop_base64_output.string'   => 'Musí obsahovať reťazec obrázka v base64 formáte.',
            'crop_file_name.required'     => 'Nejaký obrázok musí byť vložený.',
            'crop_width.required_if'      => 'Musí obsahovať číslo, keď je povolené tlačidlo "Presné rozmery".',
            'crop_height.required_if'     => 'Musí obsahovať číslo, keď je povolené tlačidlo "Presné rozmery".',
        ];
    }
}
