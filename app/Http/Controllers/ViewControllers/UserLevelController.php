<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Error;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Exception;

class UserLevelController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:RolesAccess-view|RolesAccess-edit|RolesAccess-create|RolesAccess-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:RolesAccess-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:RolesAccess-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:RolesAccess-delete', ['only' => ['destroy']]);
    }
  
    
    public function index(){

        $roles  = Role::latest()->get();
        return view('Admin.Preview.UserLevel', ['roles' => $roles]);   
   }
   public function create(){
        $permission  = Permission::get();
        return view('Admin.AddPreview.AUserLevel', ['permission' => $permission]);   
   }

   public function store(Request $requesst){

        $requesst->validate(['name' => 'required']);

        try{   
            $roles = Role::create(['name' => $requesst->name]);
            $roles->syncPermissions($requesst->permission);
        }catch(Exception){
            return back()->with('herror', 'That Role Has already Exist.'); 
        }
  
  
        return back()->with('successAdd', 'Role Successfully Set');
    }

    public function edit($Role)
    {
        $permission = Permission::get();
        $role = Role::findorfail($Role);
       return view('Admin.UpdatePreview.UUserLevel',['role'=>$role,'permissions' => $permission]);
    }

    
    public function delete($Role)
    {
        $permission = Permission::get();
        $role = Role::findorfail($Role);
       return view('Admin.UpdatePreview.UUserLevel',['role'=>$role,'permissions' => $permission]);
    }

    public function update(Request $request, $role)
    {
        $roles = Role::findorfail($role);

        try{ 
        $roles->update(['name'=>$request->name]);
        $roles->syncPermissions($request->permissions);
        }catch(Exception){
            return back()->with('herror', 'That Role Has already Exist.'); 
        }

        return back()->with('successupd', 'Role Successfully Updated');
    }

    public function destroy($role)
    {
        Role::findorfail($role)->delete();
        return back()->with('successAdd', 'Role Successfully Deleted');
    }
  
}
