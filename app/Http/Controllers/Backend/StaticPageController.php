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

    public function edit(StaticPage $staticPage) {
        return view('backend.static-pages.edit', compact('staticPage'));
    }

    public function update(StaticPageRequest $request, StaticPage $staticPage) {
        $validated = $request->validated();
        $staticPage->update($validated);

        toastr()->success(__('app.static-page.update'));
        return redirect()->route('static-pages.index');
    }

    public function destroy(StaticPage $staticPage) {
        $staticPage->delete();

        toastr()->success(__('app.static-page.delete'));
        return redirect()->route('static-pages.index');
    }
}
