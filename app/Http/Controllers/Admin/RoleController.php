<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ChunkPermissionService;

class RoleController extends Controller {
    public function index(Request $request): View {
        $roles = Role::paginate(10);

        return view('admin.roles.index', compact('roles'));
    }

    public function create(): View {
        $permissions = (new ChunkPermissionService())->permission;
        $rolePermissions = [];

        return view('admin.roles.create', compact('permissions', 'rolePermissions'));
    }

    public function store(RoleRequest $request): RedirectResponse {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        $role = Role::create($data);
        $role->syncPermissions($request->get('permission'));

        toastr()->success(__('app.role.store', ['name'=> $role->name]));
        return to_route('roles.index');
    }

    public function edit(Role $role): View {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = (new ChunkPermissionService())->permission;

        return view('admin.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        $role->update($data);
        $role->syncPermissions($request->get('permission'));

        toastr()->success(__('app.role.update', ['name'=> $role->name]));
        return to_route('roles.index');
    }

    public function destroy(Role $role): RedirectResponse {
        if ($role->id == 1) {
            toastr()->error(__('app.role.delete-error', ['name'=> $role->name]));
        } else {
            $role->delete();
            toastr()->success(__('app.role.delete', ['name'=> $role->name]));
        }

        return to_route('roles.index');
    }
}
