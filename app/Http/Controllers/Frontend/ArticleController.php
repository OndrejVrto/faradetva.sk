<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = News::with('media', 'user')->get()->paginate(5);
        return view('frontend.articles.show', compact('articles'));
    }

    public function show($slug)
    {
        $one_news = News::whereSlug($slug)->with('media', 'category', 'tags', 'user')->firstOrFail();
        $last_news = News::whereActive(1)->orderBy('updated_by', 'asc')->take(3)->with('media')->get();
        $all_categories = Category::all();
        $all_tags = Tag::all();

        return view('frontend.articles.show', compact('one_news', 'last_news', 'all_categories', 'all_tags'));
    }
}
