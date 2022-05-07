<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Services\FilePropertiesService;

// TODO:  add SEO META headers to all methods
// TODO:  refactor Title in all methods to View::composer

class ArticleController extends Controller
{
    private $viewIndex = 'frontend.article.index';

    public function show($slug): View  {
        $oneNews = News::query()
            ->visible()
            ->whereSlug($slug)
            ->with('media', 'category', 'tags', 'user')
            ->firstOrFail();

        $lastNews = News::query()
            ->visible()
            ->take(3)
            ->with('media')
            ->get();

        $allCategories = Category::query()
            ->withCount('news')
            ->get();

        $allTags = Tag::query()
            ->withCount('news')
            ->get();

        $attachments = (new FilePropertiesService)->allNewsAttachmentData($oneNews);

        $breadCrumb = (string) Breadcrumbs::render('article.show', true, $oneNews);

        return view('frontend.article.show', compact('oneNews', 'attachments', 'lastNews', 'allCategories', 'allTags', 'breadCrumb'));
    }

    public function indexAll(): View  {
        $articles = News::newsComplete();
        $title = __('frontend-texts.articles-title.all');
        $breadCrumb = (string) Breadcrumbs::render('articles.all', true);
        $emptyTitle = ['name'=> 'V článkoch', 'value' => ''];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexAuthor($userSlug): View  {
        $articles = News::whereHas('user', function($query) use ($userSlug) {
            $query->withTrashed()->whereSlug($userSlug);
        })->newsComplete();

        $userName = User::withTrashed()->whereSlug($userSlug)->value('name');
        $title = __('frontend-texts.articles-title.author') . $userName;
        $breadCrumb = (string) Breadcrumbs::render('articles.author', true, $userSlug, $userName);
        $emptyTitle = ['name'=> 'Zvolený autor', 'value' => $userName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexCategory($categorySlug): View  {
        $articles = News::whereHas('category', function($query) use ($categorySlug) {
            $query->withTrashed()->whereSlug($categorySlug);
        })->newsComplete();

        $categoryName = Category::withTrashed()->whereSlug($categorySlug)->value('title');
        $title = __('frontend-texts.articles-title.category') . $categoryName;
        $breadCrumb = (string) Breadcrumbs::render('articles.category', true, $categorySlug, $categoryName);
        $emptyTitle = ['name'=> 'Vybraná kategória', 'value' => $categoryName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexDate($year): View  {
        $articles = News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete();
        $title = __('frontend-texts.articles-title.date') . $year;
        $breadCrumb = (string) Breadcrumbs::render('articles.date', true, $year, $year);
        $emptyTitle = ['name'=> 'Vybraný rok', 'value' => (string)$year];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexTag($tagSlug): View  {
        $articles = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->withTrashed()->whereSlug($tagSlug);
        })->newsComplete();

        $tagName = Tag::withTrashed()->whereSlug($tagSlug)->value('title');
        $title = __('frontend-texts.articles-title.tags') . $tagName;
        $breadCrumb = (string) Breadcrumbs::render('articles.tag', true, $tagSlug, $tagName);
        $emptyTitle = ['name'=> 'Klúčové slovo', 'value' => $tagName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexSearch($search = null): View  {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'teaser' ,'content_plain'], $search)->newsComplete();
        $title = __('frontend-texts.articles-title.search') . $search;
        $breadCrumb = (string) Breadcrumbs::render('articles.search', true);
        $emptyTitle = ['name'=> 'Hľadaný výraz', 'value' => $search];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }
}
