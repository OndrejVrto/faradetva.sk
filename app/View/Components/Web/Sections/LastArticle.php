<?php

namespace App\View\Components\Web\Sections;

use App\Models\News;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class LastArticle extends Component
{
    public $lastArticles;

    public function __construct() {
        $this->lastArticles = Cache::rememberForever('LAST_ARTICLES', function () {
            return  News::query()
                        ->visible()
                        ->with('media', 'source' ,'category', 'user')
                        ->latest()
                        ->take(3)
                        ->get();
        });
    }

    public function render(): View|null {
        return view('components.web.sections.last-article.index');
    }
}
