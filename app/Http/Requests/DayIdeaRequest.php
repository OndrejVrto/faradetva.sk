<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayIdeaRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'author' => [
                'required',
                'string',
                'max:255',
            ],
            'idea' => [
                'required',
                'string',
                'max:4096'
            ],
        ];
    }
}
