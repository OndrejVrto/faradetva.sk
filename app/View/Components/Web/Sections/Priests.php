<?php

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Priest as PriestModel;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;
use App\Services\SEO\SetSeoPropertiesService;

class Priests extends Component
{
    public $priests;

    public function __construct() {
        $this->priests = $this->getPriests();
    }

    public function render(): View|null {
        if (!is_null($this->priests)) {
            (new SetSeoPropertiesService())->setPriestsSchema($this->priests);

            return view('components.web.sections.priests.index');
        }
        return null;
    }

    private function getPriests(): array {
        return Cache::rememberForever('PRIESTS', function(): array {
            return PriestModel::query()
                ->whereActive(1)
                ->with('media')
                ->get()
                ->map(fn($e) => $this->mapOutput($e))
                ->toArray();
        });
    }

    private function mapOutput($priest): array {
        return [
            'id'                => $priest->id,

            'titles_before'     => $priest->titles_before,
            'first_name'        => $priest->first_name,
            'last_name'         => $priest->last_name,
            'titles_after'      => $priest->titles_after,
            'full_name_titles'  => $priest->full_name_titles,

            'phone'             => $priest->phone,
            'phone_digits'      => $priest->phone_digits,
            'email'             => $priest->email,
            'personal_url'      => $priest->www_page_url,
            'facebook'          => $priest->facebook_url,
            'twitter'           => $priest->twitter_url,

            'function'          => $priest->function,

            'description_clean' => Str::plainText($priest->description),
            'description'       => (new PurifiAutolinkService)->getCleanTextWithLinks($priest->description),

            'img-url'           => isset($priest->media[0]) ? $priest->media[0]->getUrl('crop') : 'http://via.placeholder.com/230x270',
            'img-height'        => '270',
            'img-width'         => '230',
        ];
    }
}
