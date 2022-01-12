<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index() {
        $articles = News::with('media', 'user')->paginate(9);
        return view('frontend.article.index', compact('articles'));
    }

    public function show($slug) {
        $oneNews = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
        $lastNews = News::whereActive(1)->orderBy('updated_by', 'asc')->take(3)->with('media')->get();
        $allCategories = Category::all();
        $allTags = Tag::all();

        return view('frontend.article.show', compact('oneNews', 'lastNews', 'allCategories', 'allTags'));
    }
}
