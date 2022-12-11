<?php declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use App\Models\Faq as FaqModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use App\Services\PurifiAutolinkService;
use App\Services\SEO\SeoPropertiesService;

class Faq extends Component {
    public array $faqs;

    public function __construct(
        public null|array|string $questionsSlug
    ) {
        $listOfFaqs = prepareInput($questionsSlug);

        if ($listOfFaqs) {
            $cacheName = getCacheName($listOfFaqs);

            $this->faqs = Cache::rememberForever(
                key: 'FAQ_'.$cacheName,
                callback: fn (): array => FaqModel::query()
                    ->select(['id', 'question', 'answer'])
                    ->whereIn('slug', $listOfFaqs)
                    ->orderBy('order')
                    ->get()
                    ->map(fn (FaqModel $faq): array => [
                        'id'           => $faq->id,
                        'question'     => $faq->question,
                        'answer-clean' => (string) Str::plainText($faq->answer),
                        'answer'       => (new PurifiAutolinkService())->getCleanTextWithLinks($faq->answer, 'link-template-light'),
                    ])
                    ->toArray()
            );
        }
    }

    public function render(): ?View {
        if (empty($this->faqs)) {
            return null;
        }

        (new SeoPropertiesService())->setFaqSeoMetaTags($this->faqs);
        return view('components.web.sections.faq.index');
    }
}
