<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolePermissionController extends Controller
{

    public function permissions(Role $role)
    {
        $permissions = Permission::all();
        $assignedPermissionIds = $role->permissions->pluck('id')->toArray();    
        return view('admin.RolePermission.index', compact('role', 'permissions','assignedPermissionIds'));
    }


    public function store(Request $request)
    {
        $role = Role::findOrFail($request->input('role_id'));
        $permissions = $request->input('permissions');
        $role->syncPermissions($permissions);
        return response()->json(['success' => true]);
    }



    
}