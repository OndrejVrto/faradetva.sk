<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Arr;
use App\Http\Requests\UserRequest;
use App\Http\Helpers\DataFormater;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index() {
        $users = User::withCount('permissions')->with('roles', 'media')->paginate(10);

        return view('backend.users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        $userRoles = [];
        $permissions = Permission::all();
        $userPermissions = [];

        return view('backend.users.create', compact('roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function store(UserRequest $request, User $user) {
        $validated = $request->validated();
        $user->create($validated);

        // store rols to user
        $role = $request->input('role');
        $user->roles()->sync($role);

        // store permissions to user
        $permissions = $request->input('permission');
        $user->permissions()->sync($permissions);

        // Spatie media-collection
        if ($request->hasFile('photo_avatar')) {
            $user->clearMediaCollectionExcept('avatar', $user->getFirstMedia());
            $user->addMediaFromRequest('photo_avatar')
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true)  )
                ->toMediaCollection('avatar');
        }

        toastr()->success(__('app.user.store'));
        return redirect()->route('users.index');
    }

    public function show($id) {
        $user = User::whereId($id)->withCount('permissions')->with('roles', 'media')->firstOrFail();

        return view('backend.users.show', compact( 'user' ) );
    }

    public function edit(User $user) {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        $permissions = Permission::all();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('backend.users.edit', compact('user', 'roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    public function update(UserRequest $request, User $user) {
        $validated = $request->validated();

        // if no password is entered, it is removed from the request
        if( ! $request->filled('password') ) {
            $validated = Arr::except($validated, ['password']);
        }

        $user->update($validated);

        // store rols to user
        $role = $request->input('role');
        $user->roles()->sync($role);

        // store permissions to user
        $permissions = $request->input('permission');
        $user->permissions()->sync($permissions);

        // Spatie media-collection
        if ($request->hasFile('photo_avatar')) {
            $user->clearMediaCollectionExcept('avatar', $user->getFirstMedia());
            $user->addMediaFromRequest('photo_avatar')
                ->sanitizingFileName( fn($fileName) => DataFormater::filterFilename($fileName, true)  )
                ->toMediaCollection('avatar');
        }

        toastr()->success(__('app.user.update'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user) {
        $user->delete();

        toastr()->success(__('app.user.delete'));
        return redirect()->route('users.index');
    }
}
