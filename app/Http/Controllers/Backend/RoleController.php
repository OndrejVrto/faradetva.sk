<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request) {
        $roles = Role::paginate(10);

        return view('backend.roles.index', compact( 'roles' ) );
    }

    public function create() {
        $permissions = Permission::all();
        $rolePermissions = [];
        return view('backend.roles.create', compact('permissions', 'rolePermissions'));
    }

    public function store(RoleRequest $request) {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        $role = Role::create($data);
        $role->syncPermissions($request->get('permission'));

        $notification = array(
            'message' => 'Nová rola bola pridané!',
            'alert-type' => 'success'
        );

        return redirect()->route('roles.index')->with($notification);
    }

    public function edit(Role $role) {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        return view('backend.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    public function update(RoleRequest $request, $id) {

        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        $role = Role::findOrFail($id);
        $role->update($data);
        $role->syncPermissions($request->get('permission'));

        $notification = array(
            'message' => 'Rola bola uprtavená!',
            'alert-type' => 'success'
        );

        return redirect()->route('roles.index')->with($notification);
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();

        $notification = array(
            'message' => 'Rola bola zmazaná!',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.index')->with($notification);
    }
}
