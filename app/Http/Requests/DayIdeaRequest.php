<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class DayIdeaRequest extends BaseRequest
{
    public function rules(): array {
        return [
            'author' => $this->reqStrRule(),
            'idea'   => $this->reqStrRule(4096),
        ];
    }
}
