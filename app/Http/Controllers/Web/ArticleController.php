<?php declare(strict_types=1);

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
use App\Services\SEO\PageSeoPropertiesService;

// TODO:  refactor Title in all methods to View::composer

class ArticleController extends Controller {
    private const ViewNameINDEX = 'web.article.index';

    public function show(string $slug): View|Factory {
        $oneNews = Cache::rememberForever(
            key: 'ONE_NEWS_'.Str::slug($slug),
            callback: fn () => News::query()
                ->visible()
                ->where('slug', $slug)
                ->with('media', 'source', 'category', 'tags', 'user')
                ->firstOrFail()
        );

        visits($oneNews)->increment();

        $lastNews = Cache::rememberForever(
            key: 'NEWS_LAST',
            callback: fn () => News::query()
                ->visible()
                ->take(3)
                ->with('media')
                ->get()
        );

        $allCategories = Cache::rememberForever(
            key: 'CATEGORIES',
            callback: fn () => Category::query()
                ->withCount('news')
                ->orderByRaw('news_count DESC')
                ->get()
                ->filter(fn ($value) => $value->news_count > 0)
        );

        $allTags = Cache::rememberForever(
            key: 'TAGS',
            callback: fn () => Tag::query()
                ->withCount('news')
                ->orderByRaw('news_count DESC')
                ->get()
                ->filter(fn ($value) => $value->news_count > 0)
        );

        $attachments = Cache::rememberForever(
            key: 'ATTACHMENTS_'.Str::slug($slug),
            callback: fn () => (new FilePropertiesService())->allNewsAttachmentData($oneNews)
        );

        $breadCrumb = Breadcrumbs::render('article.show', true, $oneNews)->render();

        $pageData = PagePropertiesService::getArticlePageData($oneNews);
        (new PageSeoPropertiesService())
            ->setWebPageArticleSchema($pageData)
            ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author->name, $pageData->image)
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
        $articles = Cache::rememberForever(
            key: 'NEWS_ALL_PAGE-'.request('page', 1),
            callback: fn () => News::newsComplete()->paginate()
        );
        $title = strval(__('frontend-texts.articles-title.all'));
        $breadCrumb = Breadcrumbs::render('articles.all', true)->render();
        $emptyTitle = ['name'=> 'V', 'value' => 'sekcii'];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexAuthor(string $userSlug): View|Factory {
        $articles = Cache::rememberForever(
            key: 'NEWS_USER_'.$userSlug.'_PAGE-'.request('page', 1),
            callback: fn () => News::whereHas('user', function ($query) use ($userSlug) {
                $query->withTrashed()->whereSlug($userSlug);
            })->newsComplete()->paginate()
        );

        $userName = User::withTrashed()->where('slug', $userSlug)->value('name');
        $title = strval(__('frontend-texts.articles-title.author')) . $userName;
        $breadCrumb = Breadcrumbs::render('articles.author', true, $userSlug, $userName)->render();
        $emptyTitle = ['name'=> 'Zvolený autor', 'value' => $userName];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexCategory(string $categorySlug): View|Factory {
        $articles = Cache::rememberForever(
            key: 'NEWS_CATEGORY_'.$categorySlug.'_PAGE-' . request('page', 1),
            callback: fn () => News::whereHas('category', function ($query) use ($categorySlug) {
                $query->withTrashed()->whereSlug($categorySlug);
            })->newsComplete()->paginate()
        );

        $categoryName = Category::withTrashed()->where('slug', $categorySlug)->value('title');
        $title = strval(__('frontend-texts.articles-title.category')) . $categoryName;
        $breadCrumb = Breadcrumbs::render('articles.category', true, $categorySlug, $categoryName)->render();
        $emptyTitle = ['name'=> 'Vybraná kategória', 'value' => $categoryName];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexDate(int $year): View|Factory {
        $yearString = strval($year);
        $articles = Cache::rememberForever(
            key: 'NEWS_YEAR_'.$yearString.'_PAGE-'.request('page', 1),
            callback: fn () => News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete()->paginate()
        );

        $title = strval(__('frontend-texts.articles-title.date')) . $yearString;
        $breadCrumb = Breadcrumbs::render('articles.date', true, $year, $year)->render();
        $emptyTitle = ['name'=> 'Vybraný rok', 'value' => $yearString];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexTag(string $tagSlug): View|Factory {
        $articles = Cache::rememberForever(
            key: 'NEWS_TAG_'.$tagSlug.'_PAGE-' . request('page', 1),
            callback: fn () => News::whereHas('tags', function ($query) use ($tagSlug) {
                $query->withTrashed()->whereSlug($tagSlug);
            })->newsComplete()->paginate()
        );

        $tagName = Tag::withTrashed()->where('slug', $tagSlug)->value('title');
        $title = strval(__('frontend-texts.articles-title.tags')) . $tagName;
        $breadCrumb = Breadcrumbs::render('articles.tag', true, $tagSlug, $tagName)->render();
        $emptyTitle = ['name'=> 'Klúčové slovo', 'value' => $tagName];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexSearch(string $search = null): View|Factory|RedirectResponse {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'teaser' ,'content_plain'], $search)->newsComplete()->paginate();
        $title = strval(__('frontend-texts.articles-title.search')) . $search;
        $breadCrumb = Breadcrumbs::render('articles.search', true)->render();
        $emptyTitle = ['name'=> 'Hľadaný výraz', 'value' => $search];

        $this->seoIndex();

        return view(self::ViewNameINDEX, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    private function seoIndex(): void {
        $pageData = PagePropertiesService::virtualPageData('clanky');
        if ($pageData !== null) {
            (new PageSeoPropertiesService())
                ->setMetaTags($pageData->title, $pageData->description, $pageData->keywords, $pageData->author, $pageData->image)
                ->setWebPageSchema($pageData)
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
}
