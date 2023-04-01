<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
        
        return view('admin.permissions.index',compact('permissions'));
    }

    

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        $role = Permission::create($validated);
        if ($role) {
            return response()->json([
                'status' => 'success',
            ]);
        }
    }




    public function update(Request $request){
        Permission::where('id', $request->up_id)->update([
            'name' =>  $request->up_name,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }


    public function destroy(Request $request)
    {
        $category = Permission::find($request->permission_id);
        $category->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}