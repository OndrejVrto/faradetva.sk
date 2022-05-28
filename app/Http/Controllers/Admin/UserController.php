<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Services\MediaStoreService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ChunkPermissionService;

class UserController extends Controller
{
    public function index(Request $request): View {
        $users = User::query()
            ->withCount('permissions')
            ->with('roles', 'media')
            ->archive($request, 'users')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View {
        $roles = Role::where('id', '>', 1)->get();
        $userRoles = [];
        $permissions = (new ChunkPermissionService())->permission;
        $userPermissions = [];

        return view('admin.users.create', compact('roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function store(UserRequest $request): RedirectResponse {
        $validated = $request->validated();
        $user = User::create($validated);

        // store roles to user
        $role = collect($request->input('role'))
            ->filter(function ($value, $key) {
                return $value >= 2; // SuperAdmin remove
            })->when($user->id == 1, function ($collection) {
                return $collection->push(1); // SuperAdmin add
            })->toArray();
        $user->roles()->syncWithoutDetaching($role);

        // store permissions to user
        $permissions = $request->input('permission');
        $user->permissions()->syncWithoutDetaching($permissions);

        (new MediaStoreService)->handleCropPicture($user, $request, $validated['name']);

        toastr()->success(__('app.user.store', ['name'=> $user->name]));
        return to_route('users.index');
    }

    public function show(User $user): View  {
        $user->with('roles', 'media')->withCount('permissions');

        return view('admin.users.show', compact('user') );
    }

    public function edit(User $user): View|RedirectResponse  {
        if ($user->id < 3 AND auth()->user()->id != 1) {
            toastr()->error(__('app.user.update-error', ['name'=> $user->name]));
            return to_route('users.index');
        }
        $roles = Role::where('id', '>', 1)->get();
        $userRoles = $user->roles->pluck('id')->toArray();
        $permissions = (new ChunkPermissionService())->permission;
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse {
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

        (new MediaStoreService)->handleCropPicture($user, $request, $validated['name']);

        return to_route('users.index');
    }

    public function destroy(User $user): RedirectResponse {
        if ($user->id == 1 OR $user->id == 2) {
            toastr()->error(__('app.user.delete-error', ['name'=> $user->name]));
        } elseif ($user->id == auth()->user()->id) {
            toastr()->error(__('app.user.delete-self'));
        } else {
            $user->delete();
            toastr()->success(__('app.user.delete', ['name'=> $user->name]));
        }

        return to_route('users.index');
    }

    public function restore($id): RedirectResponse {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->slug = Str::slug($user->name).'-'.Str::random(5);
        $user->name = '*'.$user->name;
        $user->restore();

        toastr()->success(__('app.user.restore'));
        return to_route('users.edit', $user->slug);
    }

    public function force_delete($id): RedirectResponse {
        $user = User::onlyTrashed()->findOrFail($id);

        $user->permissions()->detach($id);
        $user->roles()->detach($id);
        // set author in news to Administrator
        $user->news()->update(['user_id' => 2]);

        $user->clearMediaCollection($user->collectionName);
        $user->forceDelete();

        toastr()->success(__('app.user.force-delete'));
        return to_route('users.index', ['only-deleted' => 'true']);
    }
}
