<?php

namespace App\View\Components\Frontend\Sections;

use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

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
                        'answer'   => $faq->answer,
                    ];
                })->first();
            });
        }
    }

    public function render(): View {
        return view('components.frontend.sections.faq.index');
    }
}
