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
        $queryBase = News::query();
        $title = config('farnost-detva.title-articles.all');

        return $this->queryAppend($queryBase, $title);
    }

    public function indexAuthor($userSlug) {
        $queryBase = News::whereHas('user', function($query) use ($userSlug) {
            $query->whereSlug($userSlug);
        });
        $title = config('farnost-detva.title-articles.author') . User::whereSlug($userSlug)->value('name');

        return $this->queryAppend($queryBase, $title);
    }

    public function indexCategory($categorySlug) {
        $queryBase = News::whereHas('category', function($query) use ($categorySlug) {
            $query->whereSlug($categorySlug);
        });
        $title = config('farnost-detva.title-articles.category') . Category::whereSlug($categorySlug)->value('title');

        return $this->queryAppend($queryBase, $title);
    }

    public function indexDate($year) {
        $queryBase = News::whereRaw('YEAR(created_at) = ?', $year);
        $title = config('farnost-detva.title-articles.date') . $year;

        return $this->queryAppend($queryBase, $title);
    }

    public function indexTag($tagSlug) {
        $queryBase = News::whereHas('tags', function($query) use ($tagSlug) {
            $query->whereSlug($tagSlug);
        });
        $title = config('farnost-detva.title-articles.tags') . Tag::whereSlug($tagSlug)->value('title');

        return $this->queryAppend($queryBase, $title);
    }

    public function indexSearch($search = null) {
        if (!$search) {
            return redirect()->route('article.all');
        }
        // fullText Search
        $queryBase = News::whereFulltext(['title', 'content'], $search);
        $title = config('farnost-detva.title-articles.search') . $search;

        return $this->queryAppend($queryBase, $title);
    }

    private function queryAppend($queryBase, $title) {
        $articles = $queryBase->whereActive(1)
                        ->published()
                        ->unpublished()
                        ->latest()
                        ->with('media', 'user')
                        ->paginate($this->countPaginate);

        return view('frontend.article.index', compact('articles', 'title'));
    }
}
