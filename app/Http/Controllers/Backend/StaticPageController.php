<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;


class StaticPageController extends Controller
{
    public function index() {
        $pages = StaticPage::paginate(5);

        return view('backend.static-pages.index', compact('pages'));
    }

    public function create() {
        return view('backend.static-pages.create');
    }

    public function store(StaticPageRequest $request) {
        $validated = $request->validated();
        StaticPage::create($validated);

        toastr()->success(__('app.static-page.store'));
        return redirect()->route('static-pages.index');
    }

    public function edit($slug) {
        $page = StaticPage::whereSlug($slug)->firstOrFail();

        return view('backend.static-pages.edit', compact('page'));
    }

    public function update(StaticPageRequest $request, $id) {
        $validated = $request->validated();
        $page = StaticPage::findOrFail($id);
        $page->update($validated);

        toastr()->success(__('app.static-page.update'));
        return redirect()->route('static-pages.index');
    }

    public function destroy($id) {
        $page = StaticPage::findOrFail($id);
        $page->delete();

        toastr()->success(__('app.static-page.delete'));
        return redirect()->route('static-pages.index');
    }
}
