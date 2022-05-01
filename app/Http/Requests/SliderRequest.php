<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class SliderRequest extends BaseRequest
{
    use HasSourceFields;
    use HasCropPictureFields;

    public function rules(): array {
        return [
            'active'    => $this->reqBoolRule(),
            'heading_1' => $this->nullStrRule(),
            'heading_2' => $this->nullStrRule(),
            'heading_3' => $this->nullStrRule(),
        ];
    }
}
