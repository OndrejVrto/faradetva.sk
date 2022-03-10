<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Diglactic\Breadcrumbs\Breadcrumbs;

class ArticleController extends Controller
{
    private $viewIndex = 'frontend.article.index';

    public function show($slug): View  {
        $oneNews = News::visible()
                        ->whereSlug($slug)
                        ->with('media', 'category', 'tags', 'user')
                        ->firstOrFail();

        $lastNews = Cache::remember('NEWS_LAST', config('farnost-detva.cache-duration.news'), function () {
            return  News::visible()
                        ->take(3)
                        ->with('media')
                        ->get();
        });
        $allCategories = Cache::remember('CATEGORIES_ALL', config('farnost-detva.cache-duration.news'), function () {
            return Category::withCount('news')->get();
        });
        $allTags = Cache::remember('TAGS_ALL', config('farnost-detva.cache-duration.news'), function () {
            return Tag::withCount('news')->get();
        });

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }

    public function indexAll(): View  {
        $articles = Cache::remember('NEWS_ALL_PAGE-' . request('page', 1), config('farnost-detva.cache-duration.news'), function () {
            return News::newsComplete();
        });
        $title = config('farnost-detva.title-articles.all');
        $breadCrumb = (string) Breadcrumbs::render('article.all', true);
        $emptyTitle = ['name'=> 'V článkoch', 'value' => ''];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexAuthor($userSlug): View  {
        $articles = News::whereHas('user', function($query) use ($userSlug) {
            $query->whereSlug($userSlug);
        })->newsComplete();

        $userName = User::whereSlug($userSlug)->value('name');
        $title = config('farnost-detva.title-articles.author') . $userName;
        $breadCrumb = (string) Breadcrumbs::render('article.author', true, $userSlug, $userName);
        $emptyTitle = ['name'=> 'Zvolený autor', 'value' => $userName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexCategory($categorySlug): View  {
        $articles = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        })->newsComplete();

        $categoryName = Category::whereSlug($categorySlug)->value('title');
        $title = config('farnost-detva.title-articles.category') . $categoryName;
        $breadCrumb = (string) Breadcrumbs::render('article.category', true, $categorySlug, $categoryName);
        $emptyTitle = ['name'=> 'Vybraná kategória', 'value' => $categoryName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexDate($year): View  {
        $articles = News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete();
        $title = config('farnost-detva.title-articles.date') . $year;
        $breadCrumb = (string) Breadcrumbs::render('article.date', true, $year, $year);
        $emptyTitle = ['name'=> 'Vybraný rok', 'value' => (string)$year];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexTag($tagSlug): View  {
        $articles = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        })->newsComplete();

        $tagName = Tag::whereSlug($tagSlug)->value('title');
        $title = config('farnost-detva.title-articles.tags') . $tagName;
        $breadCrumb = (string) Breadcrumbs::render('article.tag', true, $tagSlug, $tagName);
        $emptyTitle = ['name'=> 'Klúčové slovo', 'value' => $tagName];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }

    public function indexSearch($search = null): View  {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'content'], $search)->newsComplete();
        $title = config('farnost-detva.title-articles.search') . $search;
        $breadCrumb = (string) Breadcrumbs::render('article.search', true);
        $emptyTitle = ['name'=> 'Hľadaný výraz', 'value' => $search];

        return view($this->viewIndex, compact('articles', 'title', 'breadCrumb', 'emptyTitle'));
    }
}
