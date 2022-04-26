<?php

namespace App\View\Components\Frontend\Sections;

use App\Facades\SeoSchema;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;

class Faq extends Component
{
    public $faqs;

    public function __construct(
        public array $questionsSlug
    ) {

        $listOfFaqs = prepareInput($questionsSlug);

        if ($listOfFaqs) {
            $cacheName = getCacheName($listOfFaqs);

            $this->faqs = Cache::rememberForever('FAQ_'.$cacheName, function () use($listOfFaqs) {
                return FaqModel::whereIn('slug', $listOfFaqs)->get()->map(function($faq) {
                    return [
                        'id'           => $faq->id,
                        'question'     => $faq->question,
                        'answer-clean' => trim( preg_replace('!\s+!', ' ', preg_replace( "/\r|\n/", " ", $faq->answer ) ) ),
                        'answer'       => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    ];
                });
            });
        }

        $this->setSeoMetaTags($this->faqs);
    }

    public function render(): View {
        return view('components.frontend.sections.faq.index');
    }

    private function setSeoMetaTags(array|Collection $faqData): void {
        $questions = [];
        foreach ($faqData as $faq) {
            $questions[] = Schema::question()
                    ->name(e($faq['question']))
                    ->acceptedAnswer(
                        Schema::answer()
                            ->text(e($faq['answer-clean']))
                    );
        }

        $JsonLD = Schema::fAQPage()
            ->mainEntity( $questions )
            ->toArray();
        unset($JsonLD['@context']);

        if (SeoSchema::hasValue('hasPart')) {
            SeoSchema::addValue('hasPart', array_merge(SeoSchema::getValue('hasPart'), [$JsonLD]) );
        } else {
            SeoSchema::addValue('hasPart', [$JsonLD] );
        }

    }
}
