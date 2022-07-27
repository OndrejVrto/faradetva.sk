<?php

namespace App\Http\Requests;

class DayIdeaRequest extends BaseRequest {
    public function rules(): array {
        return [
            'author' => $this->reqStrRule(),
            'idea'   => $this->reqStrRule(4096),
        ];
    }
}
