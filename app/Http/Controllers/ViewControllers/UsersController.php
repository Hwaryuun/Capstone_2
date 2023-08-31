<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Exception;

class UsersController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Account-view|Account-edit|Account-create|Account-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Account-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Account-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Account-delete', ['only' => ['destroy','Usrindex']]);
    }
  
    
    public function index(){
        $customer = CustomerModel::orderBy('firstname')->get();

        $customercount = CustomerModel::count();
        $customercount2 = CustomerModel::onlyTrashed()->count();

        return view('Admin.Preview.Users', [
            'customer' => $customer,
            'customercount' => $customercount,
            'customercount2' => $customercount2,
        ]);
   }

   public function show($id){
        $customerview = CustomerModel::findorFail($id);
        return view('Admin.AddPreview.CustomerPrev', [
            'customerview' => $customerview,
        ]);
    }

    public function destroy($id){
            
        $customer = CustomerModel::findorFail($id);
        $customer->delete();
        return back()->with('successban',"User has been Terminated !");
    }
    public function Usrindex(){
        $customer = CustomerModel::onlyTrashed()->get();  
        return view('Admin.ArchivePreview.UsersARC',[
            'customer' => $customer,      
        ]);
    }

    public function Usrdestroy($id){
      

        try{          
            $customer = CustomerModel::onlyTrashed()->findorfail($id);
            $customer->forcedelete();
        }catch(exception $e){
            return back()->with('Cannot',"This User Cannot be banned !");
        }
    
        return back()->with('successban',"The User Has Been Ban Pemanently !");
    }

    public function Usrstore($id){
        $customer = CustomerModel::onlyTrashed()->findorfail($id);
        $customer->restore();
        return back()->with('restor',"The User Revert Successfully !");
    }


}
