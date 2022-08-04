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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Contracts\View\Factory;
use App\Services\FilePropertiesService;
use App\Services\PagePropertiesService;
use App\Services\SEO\SetSeoPropertiesService;

// TODO:  refactor Title in all methods to View::composer

class ArticleController extends Controller {
    public function show(string $slug): View|Factory {
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

        $breadCrumb = Breadcrumbs::render('article.show', true, $oneNews)->render();

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
        $title = strval(__('frontend-texts.articles-title.all'));
        $breadCrumb = Breadcrumbs::render('articles.all', true)->render();
        $emptyTitle = ['name'=> 'V', 'value' => 'sekcii'];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexAuthor(string $userSlug): View|Factory {
        $articles = Cache::rememberForever('NEWS_USER_'.$userSlug.'_PAGE-' . request('page', 1), function () use ($userSlug) {
            return News::whereHas('user', function ($query) use ($userSlug) {
                $query->withTrashed()->whereSlug($userSlug);
            })->newsComplete();
        });

        $userName = User::withTrashed()->whereSlug($userSlug)->value('name');
        $title = strval(__('frontend-texts.articles-title.author')) . $userName;
        $breadCrumb = Breadcrumbs::render('articles.author', true, $userSlug, $userName)->render();
        $emptyTitle = ['name'=> 'Zvolený autor', 'value' => $userName];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexCategory(string $categorySlug): View|Factory {
        $articles = Cache::rememberForever('NEWS_CATEGORY_'.$categorySlug.'_PAGE-' . request('page', 1), function () use ($categorySlug) {
            return News::whereHas('category', function ($query) use ($categorySlug) {
                $query->withTrashed()->whereSlug($categorySlug);
            })->newsComplete();
        });

        $categoryName = Category::withTrashed()->whereSlug($categorySlug)->value('title');
        $title = strval(__('frontend-texts.articles-title.category')) . $categoryName;
        $breadCrumb = Breadcrumbs::render('articles.category', true, $categorySlug, $categoryName)->render();
        $emptyTitle = ['name'=> 'Vybraná kategória', 'value' => $categoryName];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexDate(int $year): View|Factory {
        $yearString = strval($year);
        $articles = Cache::rememberForever('NEWS_YEAR_'.$yearString.'_PAGE-' . request('page', 1), function () use ($year) {
            return News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete();
        });

        $title = strval(__('frontend-texts.articles-title.date')) . $yearString;
        $breadCrumb = Breadcrumbs::render('articles.date', true, $year, $year)->render();
        $emptyTitle = ['name'=> 'Vybraný rok', 'value' => $yearString];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexTag(string $tagSlug): View|Factory {
        $articles = Cache::rememberForever('NEWS_TAG_'.$tagSlug.'_PAGE-' . request('page', 1), function () use ($tagSlug) {
            return News::whereHas('tags', function ($query) use ($tagSlug) {
                $query->withTrashed()->whereSlug($tagSlug);
            })->newsComplete();
        });

        $tagName = Tag::withTrashed()->whereSlug($tagSlug)->value('title');
        $title = strval(__('frontend-texts.articles-title.tags')) . $tagName;
        $breadCrumb = Breadcrumbs::render('articles.tag', true, $tagSlug, $tagName)->render();
        $emptyTitle = ['name'=> 'Klúčové slovo', 'value' => $tagName];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexSearch(string $search = null): View|Factory|RedirectResponse {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'teaser' ,'content_plain'], $search)->newsComplete();
        $title = strval(__('frontend-texts.articles-title.search')) . $search;
        $breadCrumb = Breadcrumbs::render('articles.search', true)->render();
        $emptyTitle = ['name'=> 'Hľadaný výraz', 'value' => $search];

        $this->seoIndex();

        return view('web.article.index', compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
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
