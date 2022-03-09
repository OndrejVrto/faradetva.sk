<?php

declare(strict_types = 1);

namespace App\Http\Contracts;

use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\NoticeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface {
    public function index(): View;
    public function create(): View;
    public function store(NoticeRequest $request, MediaStoreService $mediaService): RedirectResponse;
    public function edit(Model $model): View; 
    public function update(NoticeRequest $request, Model $model, MediaStoreService $mediaService): RedirectResponse;
    public function destroy(Model $model): RedirectResponse;
}