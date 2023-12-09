<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class RoleController extends Controller
{
    public function index(){
        return view('role.role',[
            'permissions'=>Permission::all(),
            'roles'=>Role::all(),
            'users'=>User::all(),
        ]);
    }
    public function storePermission(Request $request){
        Permission::create([
           'name' => $request->permission_name,
           'guard_name' => 'web'
        ]);
        return back();
    }
    public function storeRole(Request $request){

        $role = Role::create(['name' => $request->role_name,'guard_name' => 'web',]);
        $permissionNames = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();

        foreach($permissionNames as $permission){
            $role->givePermissionTo($permission);
        }
        
        return back();
    } 

    public function assignRole(Request $request){
        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);
    
        $user->assignRole($role);
    
        return back();

         // problem-this change.....
        // $user = \Auth::guard('web')->user()->find($request->user_id); // Change guard to 'web'
        // $role = Role::find($request->role_id);

        // if (!$user || !$role) {
        //     return back()->withErrors(['message' => 'User or role not found.']);
        // }
        // $user->assignRole($role);

        // return back();
    }
    public function removeRole($id){
        $user = User::find($id);
        $user->syncRoles([]);
        $user->syncPermissions([]);
        return back();
    }
    public function permissionEdit($id){
        return view('role.edit-user-permission',[
            'users'=>User::find($id),
            'permissions'=>Permission::all()
        ]);
    }
    public function permissionUpdate(Request $request){
        $user = User::find($request->id);
        $permissions = $request->permission;
        $existingPermissions = Permission::whereIn('id', $permissions)->pluck('id');

        $user->syncPermissions($existingPermissions);

        return back();
    }
}


 // pluck হলো Eloquent এর একটি মেথড যা একটি কুয়েরি ফলাফল থেকে একটি কলামের মান পেতে ব্যবহৃত হয়।
        // toArray হলো একটি মেথড যা অ্যারের সমাধান করতে একটি প্লেন PHP অ্যারেয়ে রূপান্তর করে।  অ্যারে হিসেবে সংরক্ষণ করা হয়