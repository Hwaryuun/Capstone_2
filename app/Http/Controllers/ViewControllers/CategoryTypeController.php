<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryTypeModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class CategoryTypeController extends Controller
{
    
    function __construct()
    {
        $this->middleware('role_or_permission:Service-view|Service-edit|Service-create|Service-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Service-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Service-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Service-delete', ['only' => ['destroy','printingTypeindex']]);
    }
  

    public function index(){

        $categorytype = CategoryTypeModel::orderBy('typename')->get();
        return view('Admin.Preview.PrintingType',[
           'categorytype' => $categorytype
       ]);
   }

    public function create(){
        return view('Admin.AddPreview.ACategoryType');    
    }

    public function store(Request $request){

        $this->validate($request,[
            'typename'=>['required',Rule::unique('categorytype', 'typename')],
            'status' => 'required',
        ]);
    
          $input = $request->all();   
               
          CategoryTypeModel::create($input);  

          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->typename. " Has Created From Services Module", 
          );
           AuditLogModel::create($audits);   


          return back()->with('successAdd','Service Added Successfully!');
    }

    public function edit($id){
        $categorytype = CategoryTypeModel::findorFail($id);
        // Select * from category where id = 1;
        return view('Admin.UpdatePreview.UCategoryType',[
            'categorytype' => $categorytype
        ]);    
    }

    public function update(Request $request, $id){
        $categorytype = CategoryTypeModel::findorFail($id);
        $this->validate($request,[
            'typename'=>['required',Rule::unique('categorytype', 'typename')->ignore($categorytype->id)],
        ]);
       

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $categorytype->typename." Has Updated to ".$request->typename. "  From Services Module", 
          );
        AuditLogModel::create($audits);  

        $input = $request->all();
        $categorytype->update($input);

        
        return back()->with("successupd","Service Has Been Updated !");
    }
   
    public function destroy($id){
        
        $categorytype = CategoryTypeModel::findorfail($id);

        
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $categorytype->typename." Has Deleted From Services Module", 
          );
        AuditLogModel::create($audits);  


        
        $categorytype->delete();
        return back()->with('successdel',"Service Has Been Deleted !");
    }


    public function printingTypeindex(){
        $categorytype = CategoryTypeModel::orderBy('typename')->onlyTrashed()->get();
        return view('Admin.ArchivePreview.PrintingTypeARC',[
           'categorytype' => $categorytype
       ]);
    }

    public function printingTypedestroy($id){
        $categorytype = CategoryTypeModel::onlyTrashed()->findorfail($id);

        try{        
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $categorytype->typename." Has Deleted Permanently From Services Module", 
            );
            $categorytype->forcedelete();
            AuditLogModel::create($audits);    
        }catch(exception $e){
            return back()->with('Cannot',"This Service is Connected to another Branch !");
        }
    
        return back()->with('successdel',"Service Has Been Deleted Pemanently !");
    }

    public function printingTyperestore($id){
        $categorytype = CategoryTypeModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $categorytype->typename." Has Restored From Services Module", 
        );
        AuditLogModel::create($audits);  
        $categorytype->restore();
        return back()->with('restor',"Service Has Restore Successfully !");
    }
    
}
