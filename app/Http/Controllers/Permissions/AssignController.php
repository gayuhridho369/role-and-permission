<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};

class AssignController extends Controller
{
    public function create()
    {

        return view('permission.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get()
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', "Permission has been assigned to the role {$role->name}");
    }

    public function edit(Role $role)
    {
        return view('permission.assign.sync', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get()
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'required|array'
        ]);

        $role->syncPermissions(request('permissions'));
        return redirect()->route('assign.create')->with('success', "Permission has been synced");
    }
}
