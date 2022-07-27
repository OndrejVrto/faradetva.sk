<?php

declare(strict_types=1);

namespace App\Http\Contracts;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\NoticeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface {
    public function index(Request $request): View;
    public function create(): View;
    public function store(NoticeRequest $request): RedirectResponse;
    public function edit(Model $model): View;
    public function update(NoticeRequest $request, Model $model): RedirectResponse;
    public function destroy(Model $model): RedirectResponse;
}
