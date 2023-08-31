<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisionController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Account-view|Account-edit|Account-create|Account-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Account-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Account-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Account-delete', ['only' => ['destroy', 'EMindex']]);
    }
  

    public function index(){

        $user= User::latest()->get();

        return view('Admin.Preview.Permision',['users'=>$user]);
   }

    public function create(){

        $roles = Role::whereNot('name', 'admin')->get();
        return view('Admin.AddPreview.AEmployee',['roles'=>$roles]);
    }

    public function store(Request $request){

        $request->validate([
            'first' => 'required',
            'last' => 'required',
            'roles' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);


        $user = User::create([
            'name'=>$request->first." ".$request->last ,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        $user->syncRoles($request->roles);
        return back()->with('successAdd','Employee Added Successfully !');

    }

    public function edit($user)
    {
        $usr = User::findorfail($user);
        $role = Role::whereNot('name', 'admin')->get();

        return view('Admin.UpdatePreview.UEmployee', ['user'=>$usr, 'roles' => $role]);
    }

    public function update(Request $request, $user)
    {
        $usr = User::findorfail($user);
        $validated = $request->validate([
            'fullname'=>'required',
            'email' => 'required|email|unique:users,email,'.$usr->id.',id',
        ]);
        $usr->update([  'name'=>$request->fullname,
                        'email'=>$request->email,     
        ]);

        $usr->syncRoles($request->roles);
        return back()->with('successupd','Employee Updated Successfully !');
    }

    public function destroy($id)
    {
        $usr = User::findorFail($id);
        $usr->delete();
        return back()->with('successban',"Employee has been Suspended !");
    }

    public function EMindex()
    {
        $oreki = User::orderBy('created_at', 'desc')->onlyTrashed()->get();
        return view('Admin.ArchivePreview.EmployeeARC',[
            'oreki' => $oreki,      
        ]);
    }

    public function EMstore($id)
    {
        $customer = User::onlyTrashed()->findorfail($id);
        $customer->restore();
        return back()->with('restor',"The User Revert Successfully !");
    }

    public function EMdestroy($id)
    {
        $customer = User::onlyTrashed()->findorfail($id);
        $customer->forcedelete();
        return back()->with('successban',"The User Has Been Suspended Pemanently !");
    }
}
