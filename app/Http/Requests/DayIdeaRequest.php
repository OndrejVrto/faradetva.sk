<?php declare(strict_types=1);

namespace App\Http\Requests;

class DayIdeaRequest extends BaseRequest {
    public function rules(): array {
        return [
            'author' => $this->reqStrRule(),
            'idea'   => $this->reqStrRule(4096),
        ];
    }
}
