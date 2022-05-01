<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;

class SourceRequest extends BaseRequest
{
    use HasSourceFields;
}
