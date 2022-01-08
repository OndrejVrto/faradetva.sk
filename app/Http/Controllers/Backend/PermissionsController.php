<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
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
        return view('backend.permissions.edit', [
            'permission' => $permission
        ]);
    }


    public function update(Request $request, Permission $permission)
    {
        // TODO: Problem with name database table
		// $request->validate([
        //     'name' => 'required|unique:permissions,name,'.$permission->id
        // ]);

        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }
}
