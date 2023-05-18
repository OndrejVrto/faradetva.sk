<?php declare(strict_types=1);

namespace App\Http\Requests\Traits;

use App\Rules\IsBase64Encoded;

trait HasCropPictureFields {
    /**
     * @return array{crop_output_file_name: string[], crop_output_base64: mixed[], crop_output_exact_dimensions: string[], crop_output_width: string[], crop_output_height: string[]}
     */
    protected function cropPictureRules(): array {
        return [
            'crop_output_file_name' => [
                'nullable',
                // $this->requireORnullable(),
                'string',
            ],
            'crop_output_base64' => [
                $this->requireORnullable(),
                'string',
                new IsBase64Encoded(),
            ],
            'crop_output_exact_dimensions' => [
                'boolean',
                'nullable',
            ],
            'crop_output_width' => [
                'nullable',
                'required_if:crop_exact_dimensions,1',
                'integer',
                'min:50',
            ],
            'crop_output_height' => [
                'nullable',
                'required_if:crop_exact_dimensions,1',
                'integer',
                'min:50',
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
