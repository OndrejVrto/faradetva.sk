<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ChunkPermissionService;

class UserController extends Controller
{
    public function index(): View  {
        $users = User::withCount('permissions')->with('roles', 'media')->paginate(10);

        return view('backend.users.index', compact('users'));
    }

    public function create(): View  {
        $roles = Role::where('id', '>', 1)->get();
        $userRoles = [];
        $permissions = (new ChunkPermissionService())->permission;
        $userPermissions = [];

        return view('backend.users.create', compact('roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function store(UserRequest $request, User $user, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();
        $user->create($validated);

        // store roles to user
        $role = collect($request->input('role'))
            ->filter(function ($value, $key) {
                return $value >= 2; // SuperAdmin remove
            })->when($user->id == 1, function ($collection) {
                return $collection->push(1); // SuperAdmin add
            })->toArray();
        $user->roles()->sync($role);

        // store permissions to user
        $permissions = $request->input('permission');
        $user->permissions()->sync($permissions);

        if ($request->hasFile('photo_avatar')) {
            $mediaService->storeMediaOneFile($user, $user->collectionName, 'photo_avatar');
        }

        toastr()->success(__('app.user.store', ['name'=> $user->name]));
        return to_route('users.index');
    }

    public function show(User $user): View  {
        $user->with('roles', 'media')->withCount('permissions');

        return view('backend.users.show', compact('user') );
    }

    public function edit(User $user): View  {
        if ($user->id == 1 AND auth()->user()->id != 1) {
            toastr()->error(__('app.user.update-error', ['name'=> $user->name]));
            return to_route('users.index');
        }
        $roles = Role::where('id', '>', 1)->get();
        $userRoles = $user->roles->pluck('id')->toArray();
        $permissions = (new ChunkPermissionService())->permission;
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('backend.users.edit', compact('user', 'roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function update(UserRequest $request, User $user, MediaStoreService $mediaService): RedirectResponse {
        $validated = $request->validated();

        // if no password is entered, it is removed from the request
        if (! $request->filled('password')) {
            $validated = Arr::except($validated, ['password']);
        }

        // if user change self
        if ($user->id == auth()->user()->id) {
            $validated = Arr::except($validated, ['active']);
            toastr()->warning(__('app.user.update-self'));
        } else {
            toastr()->success(__('app.user.update', ['name'=> $user->name]));
        }

        $user->update($validated);

        // store roles to user
        $role = collect($request->input('role'))
            ->filter(function ($value, $key) {
                return $value >= 2; // SuperAdmin remove
            })->when($user->id == 1, function ($collection) {
                return $collection->push(1);  // SuperAdmin add
            })->toArray();
        $user->roles()->sync($role);

        // store permissions to user
        $permissions = $request->input('permission');
        $user->permissions()->sync($permissions);

        if ($request->hasFile('photo_avatar')) {
            $mediaService->storeMediaOneFile($user, $user->collectionName, 'photo_avatar');
        }

        return to_route('users.index');
    }

    public function destroy(User $user): RedirectResponse {
        if ($user->id == 1) {
            toastr()->error(__('app.user.delete-error', ['name'=> $user->name]));
        } elseif ($user->id == auth()->user()->id) {
            toastr()->error(__('app.user.delete-self'));
        } else {
            $user->delete();
            $user->clearMediaCollection($user->collectionName);
            toastr()->success(__('app.user.delete', ['name'=> $user->name]));
        }

        return to_route('users.index');
    }
}
