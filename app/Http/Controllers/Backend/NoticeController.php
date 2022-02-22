<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Http\RedirectResponse;

class NoticeController extends Controller
{
    public function index(): View {
        $notices = Notice::with('media')->latest()->paginate(10);

        return view('backend.notices.index', compact('notices'));
    }

    public function create(): View {
        return view('backend.notices.create');
    }

    public function store(NoticeRequest $request, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $notice = Notice::create($validated);

        if ($request->hasFile('notice_file')) {
            $mediaService->storeMediaOneFile($notice, $notice->collectionName, 'notice_file');
        }

        toastr()->success(__('app.notice.store'));
        return redirect()->route('notices.index');
    }

    public function edit(Notice $notice): View {
        $notice->load('media');

        return view('backend.notices.edit', compact('notice'));
    }

    public function update(NoticeRequest $request, Notice $notice, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $notice->update($validated);

        if ($request->hasFile('notice_file')) {
            $mediaService->storeMediaOneFile($notice, $notice->collectionName, 'notice_file');
        }

        toastr()->success(__('app.notice.update'));
        return redirect()->route('notices.index');
    }

    public function destroy(Notice $notice): RedirectResponse {
        $notice->delete();
        $notice->clearMediaCollection($notice->collectionName);

        toastr()->success(__('app.notice.delete'));
        return redirect()->route('notices.index');
    }
}
