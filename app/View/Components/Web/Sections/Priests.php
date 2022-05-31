<?php

namespace App\View\Components\Web\Sections;

use App\Facades\SeoSchema;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Priest as PriestModel;
use App\Services\PurifiAutolinkService;

class Priests extends Component
{
    public $priests;

    public function __construct() {
        $this->priests = $this->getPriests();
        $this->setSeoMetaTags($this->priests);
    }

    public function render(): View|null {
        if (!is_null($this->priests)) {
            return view('components.web.sections.priests.index');
        }
        return null;
    }

    private function getPriests(): array {
        return PriestModel::query()
            ->whereActive(1)
            ->with('media')
            ->get()
            ->map(function($priest): array {
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
        })
        ->toArray();
    }

    private function setSeoMetaTags(array $priestData): void {
        foreach ($priestData as $priest) {
            $value = Schema::person()
                ->name(e($priest['full_name_titles']))
                ->givenName(e($priest['first_name']))
                ->familyName(e($priest['last_name']))
                ->honorificPrefix(e($priest['titles_before']))
                ->honorificSuffix(e($priest['titles_after']))
                ->nationality('Slovak')
                ->sameAs([$priest['facebook'], $priest['twitter']])
                ->telephone([
                    e($priest['phone']),
                    e($priest['phone_digits'])
                ])
                ->email(e($priest['email']))
                ->jobTitle('Priest'.'|'.e($priest['function']))
                ->gender('https://schema.org/Male')
                ->url($priest['personal_url'])
                ->description(e($priest['description_clean']))
                ->image(e($priest['img-url']))
                ->worksFor(
                    Schema::organization()
                        ->name('Rímskokatolícka cirkev')
                        ->url('https://www.kbs.sk')
                        ->sameAs('https://sk.wikipedia.org/wiki/R%C3%ADmskokatol%C3%ADcka_cirkev_v_Slovenskej_republike')
                )
                ->toArray();

            unset($value['@context']);
            $persons[] = $value;
        }

        SeoSchema::addValue('alumni', $persons );
    }
}
