<?php

namespace App\View\Components\Frontend\Sections;

use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Contracts\View\View;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;

class Faq extends Component
{
    public $faqs;

    public function __construct(
        public array $questionsSlug
    ) {
        foreach ($questionsSlug as $slug) {
            $this->faqs[] = Cache::rememberForever('FAQ_'.$slug, function () use($slug) {
                return FaqModel::whereSlug($slug)->get()->map(function($faq) {
                    return [
                        'id'           => $faq->id,
                        'question'     => $faq->question,
                        'answer-clean' => trim( preg_replace('!\s+!', ' ', preg_replace( "/\r|\n/", " ", $faq->answer ) ) ),
                        'answer'       => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    ];
                })->first();
            });
        }
        $this->setSeoMetaTags($this->faqs);
    }

    public function render(): View {
        return view('components.frontend.sections.faq.index');
    }

    private function setSeoMetaTags(array $faqData): void {
        $questions = [];
        foreach ($faqData as $faq) {
            $questions[] = Schema::question()
                    ->name($faq['question'])
                    ->acceptedAnswer(
                        Schema::answer()
                            ->text($faq['answer-clean'])
                    );
        }

        $JsonLD = Schema::fAQPage()
            ->mainEntity( $questions )
            ->toArray();
        unset($JsonLD['@context']);

        JsonLd::addValue('hasPart', $JsonLD );
    }
}
