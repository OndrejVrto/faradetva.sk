<?php

namespace App\View\Components\Web\Sections;

use App\Facades\SeoSchema;
use Illuminate\Support\Str;
use Spatie\SchemaOrg\Schema;
use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Services\PurifiAutolinkService;

class Faq extends Component
{
    public $faqs;

    public function __construct(
        public array $questionsSlug
    ) {
        $listOfFaqs = prepareInput($questionsSlug);

        if ($listOfFaqs) {
            $this->faqs = FaqModel::query()
                ->whereIn('slug', $listOfFaqs)
                ->orderBy('order')
                ->get()
                ->map(function($faq) {
                    return [
                        'id'           => $faq->id,
                        'question'     => $faq->question,
                        'answer-clean' => Str::plainText($faq->answer),
                        'answer'       => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    ];
                });
        }

        $this->setSeoMetaTags($this->faqs);
    }

    public function render(): View {
        return view('components.web.sections.faq.index');
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
