<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartDataRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

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
