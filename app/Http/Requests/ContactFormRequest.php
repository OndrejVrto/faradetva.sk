<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'contact' => [
                'nullable',
                'max:255',
            ],
            'address' => [
                'nullable',
                'max:255',
            ],
            'message' => [
                'required',
                'string',
                'max:10000',
            ],
        ];
    }
}
