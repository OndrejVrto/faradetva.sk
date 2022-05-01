<?php

namespace App\Http\Requests\Traits;

use App\Rules\IsBase64Encoded;

trait HasCropPictureFields
{
    protected function cropPictureRules(): array {
        return [
            'crop-base64-output' => [
                $this->requiredNullableRule(),
                'string',
                new IsBase64Encoded(),
            ],
            'crop-file-name' => [
                $this->requiredNullableRule(),
                'string',
            ],
        ];
    }

    // public function cropPictureMessages(): array {
    //     return [];
    // }
}
