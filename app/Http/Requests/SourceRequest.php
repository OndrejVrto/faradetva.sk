<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Requests\Traits\HasSourceFields;

class SourceRequest extends BaseRequest {
    use HasSourceFields;
}
