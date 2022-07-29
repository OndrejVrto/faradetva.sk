<?php

declare(strict_types=1);

namespace App\View\Components\Web\Sections;

use App\Models\News;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class LastArticle extends Component {
    public $lastArticles;

    public function __construct(
        private int $count = 3
    ) {
        $this->lastArticles = Cache::rememberForever('LAST_ARTICLES', function () {
            return  News::query()
                        ->visible()
                        ->with('media', 'source', 'category', 'user')
                        ->latest()
                        ->take($this->count)
                        ->get();
        });
    }

    public function render(): View|null {
        if (!is_null($this->lastArticles)) {
            return view('components.web.sections.last-article.index');
        }

        return null;
    }
}
