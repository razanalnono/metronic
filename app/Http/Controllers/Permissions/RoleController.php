<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        $permissions=Permission::all();
        return  view('admin.roles.index',compact('roles','permissions'));
    }


    // public function store(Request $request){

    // $validated=$request->validate([
    //     'name' => 'required|min:3'
    // ]);

    // $role=Role::create($validated);
    // if($role){
    //     return response()->json([
    //         'status'=>'success',
    //     ]);
    // }
        
    // }



    public function update(Request $request){
        Role::where('id', $request->up_id)->update([
            'name' =>  $request->up_name,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }


    public function destroy(Request $request)
    {
        $category = Role::find($request->role_id);
        $category->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function permissions(Role $role)
    {
        $permissions = Permission::all();
        $assignedPermissionIds = $role->permissions->pluck('id')->toArray();
        return view('admin.RolePermission.index', compact('role', 'permissions', 'assignedPermissionIds'));
    }

    public function store(Request $request)
    {
        $role = Role::findOrFail($request->input('role_id'));
        $permissions = $request->input('permissions');
        $role->syncPermissions($permissions);
        return response()->json(['success' => true]);
    }

}