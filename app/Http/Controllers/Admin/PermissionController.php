<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Arr;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {
    public function index(): View {
        $permissions = Permission::query()
            ->orderBy('name')
            ->paginate(100);

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create(): View {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request): RedirectResponse {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);
        Permission::create($data);

        toastr()->success((string) __('app.permission.store'));
        return to_route('permissions.index');
    }

    public function edit(Permission $permission): View {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission): RedirectResponse {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);
        $permission->update($data);

        toastr()->success((string) __('app.permission.update'));
        return to_route('permissions.index');
    }

    public function destroy(Permission $permission): RedirectResponse {
        $permission->delete();

        toastr()->success((string) __('app.permission.delete'));
        return to_route('permissions.index');
    }
}
