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
        $oneNews = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
        $lastNews = News::whereActive(1)->latest()->take(3)->with('media')->get();
        $allCategories = Category::withCount('news')->get();
        $allTags = Tag::all();

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }

    public function indexAll() {
        $articles = News::with('media', 'user')->latest()->paginate($this->countPaginate);
        $title = config('farnost-detva.title-articles.all');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexAuthor($userSlug) {
        $articles = News::whereHas('user', function($query) use ($userSlug) {
            $query->whereSlug($userSlug);
        })->with('media', 'user')->latest()->paginate($this->countPaginate);
        $title = config('farnost-detva.title-articles.author') . User::whereSlug($userSlug)->value('name');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexCategory($categorySlug) {
        $articles = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        })->with('media', 'user')->latest()->paginate($this->countPaginate);
        $title = config('farnost-detva.title-articles.category') . Category::whereSlug($categorySlug)->value('title');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexDate($year) {
        $articles = News::whereRaw('YEAR(created_at) = ?', $year)->with('media', 'user')->latest()->paginate($this->countPaginate);
        $title = config('farnost-detva.title-articles.date') . $year;

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexTag($tagSlug) {
        $articles = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        })->with('media', 'user')->latest()->paginate($this->countPaginate);
        $title = config('farnost-detva.title-articles.tags') . Tag::whereSlug($tagSlug)->value('title');

        return view('frontend.article.index', compact('articles', 'title'));
    }

    public function indexSearch($search = null) {
        if ($search) {
            // fullText Search
            $articles = News::whereFulltext(['title', 'content'], $search)
                        ->with('media', 'user')
                        ->latest()
                        ->paginate($this->countPaginate);
            $title = config('farnost-detva.title-articles.search') . $search;
        } else {
            $articles = News::with('media', 'user')->latest()->paginate($this->countPaginate);
            $title = config('farnost-detva.title-articles.all');
        }

        return view('frontend.article.index', compact('articles', 'title'));
    }
}
