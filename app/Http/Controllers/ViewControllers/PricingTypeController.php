<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricingTypeModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class PricingTypeController extends Controller
{

    
    function __construct()
    {
        $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy','prtindex']]);
    }
    

    public function index(){

       
        $pricingtype = PricingTypeModel::get();
        return view('Admin.Preview.PricingType',[
           'pricingtype' => $pricingtype
       ]);
   }

    public function create(){

        return view('Admin.AddPreview.APricingType');    
    }
    
    public function store(Request $request){
 
        $this->validate($request,[
            'name'=>['required',Rule::unique('pricingtype', 'name')],
            'status' => 'required',
        ]);
    
          $input = $request->all();     

          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->name. " Has Created From PricingType Module", 
          );
           AuditLogModel::create($audits);   
    

          PricingTypeModel::create($input);   
          return back()->with('successAdd','Pricing Type Added Successfully !');
    }
 
    public function edit($id){
        $pricingtype = PricingTypeModel::findorFail($id);
        // Select * from category where id = 1;
        return view('Admin.UpdatePreview.UPricingType',[
            'pricingtype' => $pricingtype,
        ]);    
    }
    
    public function update(Request $request, $id){
        $pricingtype = PricingTypeModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('pricingtype', 'name')->ignore($pricingtype->id)],
            'status' => 'required',
        ]);
       
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $pricingtype->name." Has Updated to ".$request->name. "  From PricingType Module", 
          );
        AuditLogModel::create($audits); 

           
        $input = $request->all();
        $pricingtype->update( $input);
 
        return back()->with('successupd','Pricing Type Has Been Updated !');
    }
 
    public function destroy($id){
        
        $pricingtype = PricingTypeModel::findorfail($id);
        
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $pricingtype->name." Has Deleted From PricingType Module", 
        );
        AuditLogModel::create($audits);  

          
        $pricingtype->delete();
        return back()->with('successdel',"Pricing Type Has Been Deleted !");
    }

       
    public function prtindex(){
        $pricingtype = PricingTypeModel::onlyTrashed()->get();
        return view('Admin.ArchivePreview.PricingTypeARC',[
            'pricingtype' => $pricingtype,      
        ]);
      }
  
      public function prtdestroy($id){
          $pricingtype = PricingTypeModel::onlyTrashed()->findorfail($id);

          try{          
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $pricingtype->name." Has Deleted Permanently From PricingType Module", 
               );
               $pricingtype->forcedelete();
               AuditLogModel::create($audits);  
          }catch(exception $e){
              return back()->with('Cannot',"This Pricing Type is Connected to another Branch !");
          }
  
          return back()->with('successdel',"Pricing Type Has Been Deleted Pemanently !");
      }
  
      public function prtstore($id){
          $pricingtype = PricingTypeModel::onlyTrashed()->findorfail($id);
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $pricingtype->name." Has Restored From PricingType Module", 
          );
          AuditLogModel::create($audits);  
          $pricingtype->restore();
          return back()->with('restor',"Pricing Type Has Restore Successfully !");
      }
}
