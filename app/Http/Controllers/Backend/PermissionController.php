<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();

        return view( 'backend.permissions.index', compact( 'permissions' ) );
    }

    public function create() {
        return view('backend.permissions.create');
    }

    public function store(PermissionRequest $request) {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);
        Permission::create($data);

        toastr()->success('Nový typ povolenia bolo pridané!');
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission) {
        return view( 'backend.permissions.edit', compact( 'permission' ) );
    }

    public function update(PermissionRequest $request, $id) {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);
        Permission::findOrFail($id)->update($data);

        toastr()->success('Povolenie bolo upravené!');
        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission) {
        $permission->delete();

        toastr()->success('Povolenie bolo zmazané!');
        return redirect()->route('permissions.index');
    }
}
