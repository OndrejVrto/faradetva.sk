<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index() {
        $articles = News::with('media', 'user')->latest()->paginate(9);
        return view('frontend.article.index', compact('articles'));
    }

    public function category($categorySlug) {
        $articles = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        })->with('media', 'user')->latest()->paginate(9);

        return view('frontend.article.index', compact('articles'));
    }

    public function tag($tagSlug) {
        $articles = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        })->with('media', 'user')->latest()->paginate(9);

        return view('frontend.article.index', compact('articles'));
    }

    public function show($slug) {
        $oneNews = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
        $lastNews = News::whereActive(1)->latest()->take(3)->with('media')->get();
        $allCategories = Category::withCount('news')->get();
        $allTags = Tag::all();

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }
}
