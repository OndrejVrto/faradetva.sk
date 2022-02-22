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

class ArticleController extends Controller
{
    private $viewIndex = 'frontend.article.index';

    public function show($slug): View  {
        $oneNews = News::visible()
                        ->whereSlug($slug)
                        ->with('media', 'category', 'tags', 'user')
                        ->firstOrFail();

        $lastNews = Cache::remember('lastNews', config('farnost-detva.cache-duration.news'), function () {
            return  News::visible()
                        ->take(3)
                        ->with('media')
                        ->get();
        });
        $allCategories = Cache::remember('allCategories', config('farnost-detva.cache-duration.news'), function () {
            return Category::withCount('news')->get();
        });
        $allTags = Cache::remember('allTags', config('farnost-detva.cache-duration.news'), function () {
            return Tag::all();
        });

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }

    public function indexAll(): View  {
        $articles = Cache::remember('allNews-page-' . request('page', 1), config('farnost-detva.cache-duration.news'), function () {
            return News::newsComplete();
        });
        $title = config('farnost-detva.title-articles.all');

        return view($this->viewIndex, compact('articles', 'title'));
    }

    public function indexAuthor($userSlug): View  {
        $articles = News::whereHas('user', function($query) use ($userSlug) {
            $query->whereSlug($userSlug);
        })->newsComplete();
        $title = config('farnost-detva.title-articles.author') . User::whereSlug($userSlug)->value('name');

        return view($this->viewIndex, compact('articles', 'title'));
    }

    public function indexCategory($categorySlug): View  {
        $articles = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        })->newsComplete();
        $title = config('farnost-detva.title-articles.category') . Category::whereSlug($categorySlug)->value('title');

        return view($this->viewIndex, compact('articles', 'title'));
    }

    public function indexDate($year): View  {
        $articles = News::whereRaw('YEAR(created_at) = ?', $year)->newsComplete();
        $title = config('farnost-detva.title-articles.date') . $year;

        return view($this->viewIndex, compact('articles', 'title'));
    }

    public function indexTag($tagSlug): View  {
        $articles = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        })->newsComplete();
        $title = config('farnost-detva.title-articles.tags') . Tag::whereSlug($tagSlug)->value('title');

        return view($this->viewIndex, compact('articles', 'title'));
    }

    public function indexSearch($search = null): View  {
        if (!$search) {
            return to_route('article.all');
        }
        $articles = News::whereFulltext(['title', 'content'], $search)->newsComplete();
        $title = config('farnost-detva.title-articles.search') . $search;

        return view($this->viewIndex, compact('articles', 'title'));
    }
}
