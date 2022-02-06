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
            'chart_id' => [
                'required',
                'exists:charts,id'
            ],
            'key' => [
                'required',
                'max:255',
            ],
            'value' => [
                'numeric'
            ],
        ];
    }
}
