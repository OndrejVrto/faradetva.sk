<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\StaticPage;
use App\Http\Requests\FaqRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    public function index(): View {
        $faqs = Faq::query()
            ->latest('updated_at')
            ->withCount('staticPages')
            ->with('staticPages')
            ->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View {
        $pages = StaticPage::select(['id','title','description_page'])->whereActive(1)->orderBy('title')->get();
        $selectedPages = [];

        return view('admin.faqs.create', compact('pages', 'selectedPages'));
    }

    public function store(FaqRequest $request): RedirectResponse {
        $validated = $request->validated();
        $faq = Faq::create(Faq::sanitize($validated));
        $faq->staticPages()->syncWithoutDetaching($request->input('page'));

        toastr()->success(__('app.faq.store'));
        return to_route('faqs.index');
    }

    public function edit(Faq $faq): View {
        $faq->load('staticPages');
        $pages = StaticPage::select(['id','title','description_page'])->whereActive(1)->orderBy('title')->get();
        $selectedPages = $faq->staticPages->pluck('id')->unique()->toArray();

        return view('admin.faqs.edit', compact('faq', 'pages', 'selectedPages'));
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse {
        $validated = $request->validated();
        $faq->update(Faq::sanitize($validated));
        $faq->staticPages()->sync($request->input('page'));

        toastr()->success(__('app.faq.update'));
        return to_route('faqs.index');
    }

    public function destroy(Faq $faq): RedirectResponse {
        $faq->staticPages()->detach();
        $faq->delete();

        toastr()->success(__('app.faq.delete'));
        return to_route('faqs.index');
    }
}
