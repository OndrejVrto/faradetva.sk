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
use App\Services\SEO\SetSeoPropertiesService;

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

        (new SetSeoPropertiesService())->setFaqSeoMetaTags($this->faqs);
    }

    public function render(): View {
        return view('components.web.sections.faq.index');
    }


}
