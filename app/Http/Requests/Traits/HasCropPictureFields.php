<?php

namespace App\Http\Requests\Traits;

use App\Rules\IsBase64Encoded;

trait HasCropPictureFields
{
    protected function cropPictureRules(): array {
        return [
            'crop_file_name' => [
                $this->requiredNullableRule(),
                'string',
            ],
            'crop_base64_output' => [
                $this->requiredNullableRule(),
                'string',
                new IsBase64Encoded(),
            ],
        ];
    }

    public function cropPictureMessages(): array {
        return [
            'crop_base64_output.required' => 'Nejaký obrázok musí byť vložený.',
            'crop_base64_output.string'   => 'Musí obsahovať reťazec obrázka v base64 formáte.',
            'crop_file_name.required'     => 'Nejaký obrázok musí byť vložený.',
        ];
    }
}
