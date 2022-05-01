<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasCropPictureFields;

class PriestRequest extends BaseRequest
{
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'active'        => $this->reqBoolRule(),

            'first_name'    => $this->reqStrRule(),
            'last_name'     => $this->reqStrRule(),

            'titles_before' => $this->nullStrRule(),
            'titles_after'  => $this->nullStrRule(),
            'function'      => $this->nullStrRule(),
            'twiter_name'   => $this->nullStrRule(),

            'facebook_url'  => $this->nullUrlRule(),
            'www_page'      => $this->nullUrlRule(),

            'phone' => [
                'nullable',
                'regex:/[\d\+\-\ ]+/',
            ],
            'email' => [
                'nullable',
                'string',
                'email:rfc,dns,filter',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }
}

