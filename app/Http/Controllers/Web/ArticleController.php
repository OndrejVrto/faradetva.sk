<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Services\FilePropertiesService;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

// TODO:  refactor Title in all methods to View::composer

class ArticleController extends Controller {
    private $viewIndex = 'web.article.index';

    public function show($slug): View {
        $oneNews = Cache::rememberForever('ONE_NEWS_'.Str::slug($slug), function () use ($slug) {
            return News::query()
                ->visible()
                ->whereSlug($slug)
                ->with('media', 'source', 'category', 'tags', 'user')
                ->firstOrFail();
        });

        $lastNews = Cache::rememberForever('NEWS_LAST', function () {
            return News::query()
                ->visible()
                ->take(3)
                ->with('media')
                ->get();
        });

        $allCategories = Cache::rememberForever('CATEGORIES', function () {
            return Category::query()
                ->withCount('news')
                ->orderByRaw('news_count DESC')
                ->get()
                ->filter(function ($value) {
                    return $value->news_count > 0;
                });
        });

        $allTags = Cache::rememberForever('TAGS', function () {
            return Tag::query()
                ->withCount('news')
                ->orderByRaw('news_count DESC')
                ->get()
                ->filter(function ($value) {
                    return $value->news_count > 0;
                });
        });

        $attachments = Cache::rememberForever('ATTACHMENTS_'.Str::slug($slug), function () use ($oneNews) {
            return (new FilePropertiesService())->allNewsAttachmentData($oneNews);
        });

        $breadCrumb = (string) Breadcrumbs::render('article.show', true, $oneNews);

        $pageData = PagePropertiesService::getArticlePageData($oneNews);
        (new SetSeoPropertiesService($pageData))
            ->setWebPageArticleSchema()
            ->setMetaTags()
            ->setWebsiteSchemaGraph()
            ->setBreadcrumbSchemaGraph([
                0 => [
                    'title' => 'Všetky články',
                    'url' => route('article.all')
                ],
                1 => [
                    'title' => e($oneNews->title),
                    'url' => route('article.show', $oneNews->slug)
                ]
            ]);

        return view('web.article.show', compact('oneNews', 'attachments', 'lastNews', 'allCategories', 'allTags', 'breadCrumb'));
    }

    public function indexAll(): View {
        $articles = Cache::rememberForever('NEWS_ALL_PAGE-' . request('page', 1), function () {
            return News::newsComplete();
        });
        $title = __('frontend-texts.articles-title.all');
        $breadCrumb = (string) Breadcrumbs::render('articles.all', true);
        $emptyTitle = ['name'=> 'V', 'value' => 'sekcii'];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexAuthor($userSlug): View {
        $articles = Cache::rememberForever('NEWS_USER_'.$userSlug.'_PAGE-' . request('page', 1), function () use ($userSlug) {
            return News::whereHas('user', function ($query) use ($userSlug) {
                $query->withTrashed()->whereSlug($userSlug);
            })->newsComplete();
        });

        $userName = User::withTrashed()->whereSlug($userSlug)->value('name');
        $title = __('frontend-texts.articles-title.author') . $userName;
        $breadCrumb = (string) Breadcrumbs::render('articles.author', true, $userSlug, $userName);
        $emptyTitle = ['name'=> 'Zvolený autor', 'value' => $userName];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexCategory($categorySlug): View {
        $articles = Cache::rememberForever('NEWS_CATEGORY_'.$categorySlug.'_PAGE-' . request('page', 1), function () use ($categorySlug) {
            return News::whereHas('category', function ($query) use ($categorySlug) {
                $query->withTrashed()->whereSlug($categorySlug);
            })->newsComplete();
        });

        $categoryName = Category::withTrashed()->whereSlug($categorySlug)->value('title');
        $title = __('frontend-texts.articles-title.category') . $categoryName;
        $breadCrumb = (string) Breadcrumbs::render('articles.category', true, $categorySlug, $categoryName);
        $emptyTitle = ['name'=> 'Vybraná kategória', 'value' => $categoryName];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexDate($year): View {
        $articles = Cache::rememberForever('NEWS_YEAR_'.$year.'_PAGE-' . request('page', 1), function () use ($year) {
            return News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete();
        });

        $title = __('frontend-texts.articles-title.date') . $year;
        $breadCrumb = (string) Breadcrumbs::render('articles.date', true, $year, $year);
        $emptyTitle = ['name'=> 'Vybraný rok', 'value' => (string)$year];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexTag($tagSlug): View {
        $articles = Cache::rememberForever('NEWS_TAG_'.$tagSlug.'_PAGE-' . request('page', 1), function () use ($tagSlug) {
            return News::whereHas('tags', function ($query) use ($tagSlug) {
                $query->withTrashed()->whereSlug($tagSlug);
            })->newsComplete();
        });

        $tagName = Tag::withTrashed()->whereSlug($tagSlug)->value('title');
        $title = __('frontend-texts.articles-title.tags') . $tagName;
        $breadCrumb = (string) Breadcrumbs::render('articles.tag', true, $tagSlug, $tagName);
        $emptyTitle = ['name'=> 'Klúčové slovo', 'value' => $tagName];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexSearch($search = null): View {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'teaser' ,'content_plain'], $search)->newsComplete();
        $title = __('frontend-texts.articles-title.search') . $search;
        $breadCrumb = (string) Breadcrumbs::render('articles.search', true);
        $emptyTitle = ['name'=> 'Hľadaný výraz', 'value' => $search];

        $this->seoIndex();

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    private function seoIndex(): void {
        $pageData = PagePropertiesService::virtualPageData('clanky');
        (new SetSeoPropertiesService($pageData))
            ->setMetaTags()
            ->setWebPageSchema()
            ->setWebsiteSchemaGraph()
            ->setOrganisationSchemaGraph()
            ->setBreadcrumbSchemaGraph([
                0 => [
                    'title' => 'Všetky články',
                    'url' => route('article.all')
                ]
            ]);
    }
}
