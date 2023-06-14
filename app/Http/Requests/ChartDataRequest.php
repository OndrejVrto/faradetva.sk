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
            'color' => [
                'nullable',
                'regex:/^(#(?:[0-9a-f]{2}){2,4}|#[0-9a-f]{3}|(?:rgba?|hsla?)\((?:\d+%?(?:deg|rad|grad|turn)?(?:,|\s)+){2,3}[\s\/]*[\d\.]+%?\))$/i',
                'max:10',
            ],
        ];
    }

    public function messages() {
        return [
            'value.numeric' => 'Hodnota musí byť číslo. Ako oddeľovač desatiných miest použi bodku.',
        ];
    }
}
