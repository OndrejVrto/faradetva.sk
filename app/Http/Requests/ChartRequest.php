<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\ChartType;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ChartRequest extends BaseRequest {
    /**
     * @return array{active: mixed[], title: mixed[], description: mixed[], slug: \Illuminate\Validation\Rules\Unique, name_x_axis: mixed[], name_y_axis: mixed[], type_chart: \Illuminate\Validation\Rules\Enum[]|string[], color: string[]}
     */
    public function rules(): array {
        return [
            'active'      => $this->reqBoolRule(),
            'title'       => $this->reqStrRule(),
            'description' => $this->nullStrRule(),
            'slug'        => Rule::unique('charts', 'slug')->ignore($this->chart)->withoutTrashed(),
            'name_x_axis' => $this->reqStrRule(),
            'name_y_axis' => $this->reqStrRule(),
            'type_chart'  => [
                'required',
                new Enum(ChartType::class),
            ],
            'color' => [
                'required',
                'regex:/^(#(?:[0-9a-f]{2}){2,4}|#[0-9a-f]{3}|(?:rgba?|hsla?)\((?:\d+%?(?:deg|rad|grad|turn)?(?:,|\s)+){2,3}[\s\/]*[\d\.]+%?\))$/i',
                'max:10',
            ],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);
    }
}
