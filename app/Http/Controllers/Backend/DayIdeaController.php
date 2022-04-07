<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\DayIdea;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DayIdeaRequest;

class DayIdeaController extends Controller
{
    public function index(Request $request): View {
        $ideas = DayIdea::query()
            ->latest()
            ->paginate(100);

        return view('backend.day-ideas.index', compact('ideas'));
    }

    public function create(): View  {
        return view('backend.day-ideas.create');
    }

    public function store(DayIdeaRequest $request): RedirectResponse {
        $validated = $request->validated();
        DayIdea::create($validated);

        toastr()->success(__('app.day-idea.store'));
        return to_route('day-ideas.index');
    }

    public function edit(DayIdea $dayIdea): View  {
        return view('backend.day-ideas.edit', compact('dayIdea'));
    }

    public function update(DayIdeaRequest $request, DayIdea $dayIdea): RedirectResponse {
        $validated = $request->validated();
        $dayIdea->update($validated);

        toastr()->success(__('app.day-idea.update'));
        return to_route('day-ideas.index');
    }

    public function destroy(DayIdea $dayIdea): RedirectResponse {
        $dayIdea->delete();

        toastr()->success(__('app.day-idea.delete'));
        return to_route('day-ideas.index');
    }
}
