<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;


class StaticPageController extends Controller
{
    public function index() {
        $pages = StaticPage::with('media')->paginate(5);
        // $pages = StaticPage::paginate(5);
        return view('backend.static-pages.index', compact('pages'));
    }

    public function create() {
        return view('backend.static-pages.create');
    }

    public function store(StaticPageRequest $request) {
        //
    }

    public function edit($slug) {
        $page = StaticPage::whereSlug($slug)->with('media')->firstOrFail();

        return view('backend.static-pages.edit', compact('page'));
    }

    public function update($id, StaticPageRequest $request) {
        //
    }

    public function destroy($id) {
        //
    }
}
