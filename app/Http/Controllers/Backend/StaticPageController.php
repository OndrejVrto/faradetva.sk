<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StaticPageRequest;

class StaticPageController extends Controller
{
    public function index(): View  {
        $pages = StaticPage::latest()->paginate(10);

        return view('backend.static-pages.index', compact('pages'));
    }

    public function create(): View  {
        return view('backend.static-pages.create');
    }

    public function store(StaticPageRequest $request): RedirectResponse {
        $validated = $request->validated();
        StaticPage::create($validated);

        toastr()->success(__('app.static-page.store'));
        return to_route('static-pages.index');
    }

    public function edit(StaticPage $staticPage): View  {
        return view('backend.static-pages.edit', compact('staticPage'));
    }

    public function update(StaticPageRequest $request, StaticPage $staticPage): RedirectResponse {
        $validated = $request->validated();
        $staticPage->update($validated);

        toastr()->success(__('app.static-page.update'));
        return to_route('static-pages.index');
    }

    public function destroy(StaticPage $staticPage): RedirectResponse {
        $staticPage->delete();

        toastr()->success(__('app.static-page.delete'));
        return to_route('static-pages.index');
    }
}
