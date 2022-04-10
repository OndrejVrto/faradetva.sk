<?php

namespace App\View\Components\Frontend\Sections;

use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Contracts\View\View;
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
                        'id'       => $faq->id,
                        'question' => $faq->question,
                        'answer'   => (new PurifiAutolinkService)->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    ];
                })->first();
            });
        }
    }

    public function render(): View {
        return view('components.frontend.sections.faq.index');
    }
}
