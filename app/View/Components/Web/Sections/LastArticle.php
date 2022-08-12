<?php

declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use App\Models\News;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class LastArticle extends Component {
    public Collection $lastArticles;

    public function __construct(
        private readonly ?int $count = 3
    ) {
        $this->lastArticles = Cache::rememberForever('LAST_ARTICLES',
            fn(): Collection => News::query()
                ->visible()
                ->with('media', 'source', 'category', 'user')
                ->latest()
                ->take($this->count)
                ->get()
        );
    }

    public function render(): ?View {
        return $this->lastArticles->isEmpty()
            ? null
            : view('components.web.sections.last-article.index');
    }
}
