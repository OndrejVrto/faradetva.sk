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
            'titles_before' => $this->nullStrRule(),
            'first_name'    => $this->reqStrRule(),
            'last_name'     => $this->reqStrRule(),
            'titles_after'  => $this->nullStrRule(),
            'function'      => $this->nullStrRule(),
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
            // 'photo' => [
            //     'dimensions:min_width=230,min_height=270',
        ];
    }
}

