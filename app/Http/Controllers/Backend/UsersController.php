<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('permissions')->with('roles', 'media')->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$roles = Role::all();
		$userRoles = [];
		$permissions = Permission::all();
		$userPermissions = [];

        return view('backend.users.create', compact('roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param UserStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, UserStoreRequest $request)
    {
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
			$user->addMediaFromRequest('photo_avatar')->toMediaCollection('avatar');
		}

		// notification and request
		$notification = array(
			'message' => 'Uživateľ bol pridaný!',
			'alert-type' => 'success'
		);
        return redirect()->route('users.index')->with($notification);
    }


    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', compact( 'user' ) );
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
		$roles = Role::all();
		$userRoles = $user->roles->pluck('id')->toArray();
		$permissions = Permission::all();
		$userPermissions = $user->permissions->pluck('id')->toArray();
        return view('backend.users.edit', compact('user', 'roles', 'userRoles', 'permissions', 'userPermissions'));
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UserUpdateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserUpdateRequest $request)
    {
		// validation
		$validated = $request->validated();

		// if no password is entered, it is removed from the request
		if( ! $request->filled('password') )
		{
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
			$user->addMediaFromRequest('photo_avatar')->toMediaCollection('avatar');
		}

		// notification and request
		$notification = array(
			'message' => 'Uživateľ bol upravený!',
			'alert-type' => 'success'
		);
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

		$notification = array(
			'message' => 'Uživateľ bol odstránený!',
			'alert-type' => 'success'
		);

        return redirect()->route('users.index')->with($notification);
    }
}
