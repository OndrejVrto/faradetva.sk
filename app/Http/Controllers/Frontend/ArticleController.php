<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    private $countPaginate = 7;

    public function show($slug) {
        $oneNews = News::whereActive(1)
                        ->published()
                        ->unpublished()
                        ->whereSlug($slug)
                        ->with('media', 'category', 'tags', 'user')
                        ->firstOrFail();
        $lastNews = News::whereActive(1)
                        ->published()
                        ->unpublished()
                        ->latest()
                        ->take(3)
                        ->with('media')
                        ->get();
        $allCategories = Category::withCount('news')->get();
        $allTags = Tag::all();

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }

    public function indexAll() {
        $queryBase = News::with('media', 'user');
        $articles = $this->queryAppend($queryBase);
        $title = config('farnost-detva.title-articles.all');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexAuthor($userSlug) {
        $queryBase = News::whereHas('user', function($query) use ($userSlug) {
            $query->whereSlug($userSlug);
        });
        $articles = $this->queryAppend($queryBase);
        $title = config('farnost-detva.title-articles.author') . User::whereSlug($userSlug)->value('name');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexCategory($categorySlug) {
        $queryBase = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        });
        $articles = $this->queryAppend($queryBase);
        $title = config('farnost-detva.title-articles.category') . Category::whereSlug($categorySlug)->value('title');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexDate($year) {
        $queryBase = News::whereRaw('YEAR(created_at) = ?', $year);
        $articles = $this->queryAppend($queryBase);
        $title = config('farnost-detva.title-articles.date') . $year;

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexTag($tagSlug) {
        $queryBase = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        });
        $articles = $this->queryAppend($queryBase);
        $title = config('farnost-detva.title-articles.tags') . Tag::whereSlug($tagSlug)->value('title');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexSearch($search = null) {
        if ($search) {
            // fullText Search
            $queryBase = News::whereFulltext(['title', 'content'], $search);
            $title = config('farnost-detva.title-articles.search') . $search;
        } else {
            $queryBase = News::class;
            $title = config('farnost-detva.title-articles.all');
        }
        $articles = $this->queryAppend($queryBase);

        return view('frontend.article.index', compact('articles', 'title'));
    }

    private function queryAppend($queryBase) {
        return $queryBase->whereActive(1)
                        ->published()
                        ->unpublished()
                        ->latest()
                        ->with('media', 'user')
                        ->paginate($this->countPaginate);
    }
}
