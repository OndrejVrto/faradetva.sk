<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, $search = null)
	{
		if ( is_null($search) )
		{
			$news = News::with('media', 'user')->get();
		} else {
			$news = News::with('media', 'user')->get()->random(2);
		}
		// $last_news = News::whereActive(1)->orderBy('updated_by', 'asc')->take(3)->with('media')->get();
		$all_categories = Category::all();
		$all_tags = Tag::all();

		return view('news.search', compact('news', 'all_categories', 'all_tags'));
	}
}
