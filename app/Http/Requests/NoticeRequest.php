<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use App\Rules\DateTimeAfterNow;
use Illuminate\Validation\Rule;

class NoticeRequest extends BaseRequest {
    /**
     * @return array{active: mixed[], title: mixed[], slug: \Illuminate\Validation\Rules\Unique, published_at: \App\Rules\DateTimeAfterNow[]|string[], unpublished_at: \App\Rules\DateTimeAfterNow[]|string[], notice_file: string[]}
     */
    public function rules(): array {
        $modelName = $this->route() instanceof Route
                        ? Str::replace('-', '_', collect($this->route()->getController())->toArray()["\x00*\x00resource"])  // @phpstan-ignore-line
                        : 'notice';

        // dd(Rule::unique('notices', 'slug')->ignore($this->{$modelName})->withoutTrashed(),);
        return [
            'active' => $this->reqBoolRule(),
            'title'  => $this->reqStrRule(),
            'slug'   => Rule::unique('notices', 'slug')->ignore($this->{$modelName})->withoutTrashed(),
            'published_at' => [
                'nullable',
                'date',
                new DateTimeAfterNow($this->timezone),
            ],
            'unpublished_at' => [
                'nullable',
                'date',
                'after:published_at',
                new DateTimeAfterNow($this->timezone),
            ],
            'notice_file' => [
                'file',
                'mimes:pdf',
                'max:10000',
            ],
        ];
    }

    public function messages(): array {
        return [
            'slug.unique' => 'Takýto nadpis už existuje medzi farskými oznamami alebo medzi rozpismi lektorov/akolytov. Zvoľ iný.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'title' => Str::replace(',', ' ', $this->title),
            'slug'  => Str::slug($this->title)
        ]);

        is_null($this->published_at) ?: $this->merge([
            'published_at' => date('Y-m-d H:i:s', strtotime((string) $this->published_at) ?: null)
        ]);

        is_null($this->unpublished_at) ?: $this->merge([
            'unpublished_at' => date('Y-m-d H:i:s', strtotime((string) $this->unpublished_at) ?: null)
        ]);
    }
}
