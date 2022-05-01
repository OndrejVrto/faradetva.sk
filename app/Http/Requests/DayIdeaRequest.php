<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class DayIdeaRequest extends BaseRequest
{
    public function rules(): array {
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
