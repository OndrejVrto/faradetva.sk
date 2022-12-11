<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Requests\Traits\HasSourceFields;
use App\Http\Requests\Traits\HasCropPictureFields;

class SliderRequest extends BaseRequest {
    use HasSourceFields;
    use HasCropPictureFields;

    /**
     * @return array{active: mixed[], heading_1: mixed[], heading_2: mixed[], heading_3: mixed[]}
     */
    public function rules(): array {
        return [
            'active'    => $this->reqBoolRule(),
            'heading_1' => $this->nullStrRule(),
            'heading_2' => $this->nullStrRule(),
            'heading_3' => $this->nullStrRule(),
        ];
    }
}
