<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view( 'backend.permissions.index', compact( 'permissions' ) );
    }

    public function create()
    {
        return view('backend.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        Permission::create($data);

        $notification = array(
            'message' => 'Nový typ povolenia bolo pridané!',
            'alert-type' => 'success'
        );

        return redirect()->route('permissions.index')->with($notification);
    }

    public function edit(Permission $permission)
    {
        return view( 'backend.permissions.edit', compact( 'permission' ) );
    }

    public function update(PermissionRequest $request, $id)
    {
        $validated = $request->validated();
        $data = Arr::only($validated, ['name']);

        Permission::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Povolenie bolo upravené!',
            'alert-type' => 'success'
        );

        return redirect()->route('permissions.index')->with($notification);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        $notification = array(
            'message' => 'Povolenie bolo zmazané!',
            'alert-type' => 'success'
        );
        return redirect()->route('permissions.index')->with($notification);
    }
}
