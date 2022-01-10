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
        $validated = $request->validated();
        StaticPage::create($validated);

        // notification and request
        $notification = array(
            'message' => 'Nová statická stránka bola pridaná!',
            'alert-type' => 'success'
        );
        return redirect()->route('static-pages.index')->with($notification);
    }

    public function edit($slug) {
        $page = StaticPage::whereSlug($slug)->with('media')->firstOrFail();

        return view('backend.static-pages.edit', compact('page'));
    }

    public function update(StaticPageRequest $request, $id) {
        $validated = $request->validated();
        $page = StaticPage::findOrFail($id);
        $page->update($validated);

        // notification and request
        $notification = array(
            'message' => 'Statická stránka bola upravená!',
            'alert-type' => 'success'
        );
        return redirect()->route('static-pages.index')->with($notification);
    }

    public function destroy($id) {
        $page = StaticPage::findOrFail($id);
        $page->delete();

        // notification and request
        $notification = array(
            'message' => 'Statická stránka bola odstránená!',
            'alert-type' => 'success'
        );
        return redirect()->route('static-pages.index')->with($notification);
    }
}
