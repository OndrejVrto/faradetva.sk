<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;


class StaticPageController extends Controller
{
    public function index() {
        $pages = StaticPage::with('media')->paginate(5);

        return view('backend.static-pages.index', compact('pages'));
    }

    public function create() {
        return view('backend.static-pages.create');
    }

    public function store(StaticPageRequest $request) {
        $validated = $request->validated();
        StaticPage::create($validated);

        toastr()->success('Nová statická stránka bola pridaná!');
        return redirect()->route('static-pages.index');
    }

    public function edit($slug) {
        $page = StaticPage::whereSlug($slug)->with('media')->firstOrFail();

        return view('backend.static-pages.edit', compact('page'));
    }

    public function update(StaticPageRequest $request, $id) {
        $validated = $request->validated();
        $page = StaticPage::findOrFail($id);
        $page->update($validated);

        toastr()->success('Statická stránka bola upravená!');
        return redirect()->route('static-pages.index');
    }

    public function destroy($id) {
        $page = StaticPage::findOrFail($id);
        $page->delete();

        toastr()->success('Statická stránka bola odstránená!');
        return redirect()->route('static-pages.index');
    }
}
