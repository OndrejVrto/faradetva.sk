<?php declare(strict_types=1);

namespace App\Http\Requests;

class ChartDataRequest extends BaseRequest {
    /**
     * @return array{key: string[], value: string[]}
     */
    public function rules(): array {
        return [
            'key' => [
                'required',
                'max:255',
            ],
            'value' => [
                'numeric'
            ],
        ];
    }

    public function messages() {
        return [
            'value.numeric' => 'Hodnota musí byť číslo. Ako oddeľovač desatiných miest použi bodku.',
        ];
    }
}
