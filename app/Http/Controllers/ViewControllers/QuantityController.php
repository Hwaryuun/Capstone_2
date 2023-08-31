<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuantityModel;
use App\Models\CategoryTypeModel;
use App\Models\LeafModel;
use App\Models\PricingTypeModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class QuantityController extends Controller
{
    
    function __construct()
    {
        $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy', 'Qindex']]);
    }
    
    public function index(){
        $quantities = QuantityModel::orderBy('value')->with(['CategoryType', 'PricingType'])->get();

        return view('Admin.Preview.Quantity', [
            'quantities' => $quantities
        ]);
   }

   
   public function create(){

    $categorytype = CategoryTypeModel::orderBy('typename')
      ->select('id', 'typename')
      ->where('status', "Active")
      ->get();

      $pricingtype = PricingTypeModel::orderBy('name')
      ->where('status', "Active")
      ->get();

      return view('Admin.AddPreview.AQuantity',[
        'categorytype' => $categorytype, 
         'pricingtype' => $pricingtype
     ]);  
   }

    public function store(Request $request){

    $this->validate($request,[
        'quantity' => 'required',
        'value' => 'required',
        'categorytype_id'=>'required',
        'pricingtype_id'=>'required',
        'status' => 'required',
    ]);

        $input = $request->all();

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->quantity. " Has Created From Quantity Module", 
          );
           AuditLogModel::create($audits);   

           
        QuantityModel::create($input);   
        return back()->with('successAdd','Quantity Added Successfully !');
    }

  public function edit($id){

      $quantities = QuantityModel::findorFail($id);
      // Select * from category where id = 1;

      $categorytype = CategoryTypeModel::orderBy('typename')
      ->select('id', 'typename')
      ->get();

      $pricingtype = PricingTypeModel::orderBy('name')
      ->select('id', 'name')
      ->get();


      return view('Admin.UpdatePreview.UQuantity',[
          'quantities' => $quantities,
          'categorytype' => $categorytype,
          'pricingtype' => $pricingtype
      ]);    
  
  }

  public function update(Request $request, $id){

      $quantities = QuantityModel::findorFail($id);
      $this->validate($request,[
        'quantity' => 'required',
        'value' => 'required',
        'categorytype_id'=>'required',
        'pricingtype_id'=>'required',
        'status' => 'required',
      ]);
     
      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Update",
        'description' =>  $quantities->quantity." Has Updated to ".$request->quantity. "  From Quantity Module", 
      );
       AuditLogModel::create($audits); 
  

      $input = $request->all();
      $quantities->update( $input);

      return back()->with('successupd','Quantity Has Been Updated !');   
  
  }

  
    public function destroy($id){
        
        $sizes = QuantityModel::findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $sizes->quantity." Has Deleted From Quantity Module", 
        );
        AuditLogModel::create($audits);  

          
        $sizes->delete();
        return back()->with('successdel',"Quantity Has Been Deleted !");
    }
  
    public function Qindex(){
        $quantities = QuantityModel::onlyTrashed()->with(['CategoryType', 'PricingType'])->get();
        return view('Admin.ArchivePreview.QuantityARC',[
            'quantities' => $quantities,      
        ]);
    }

    public function Qdestroy($id){
        $quantities = QuantityModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete : Archives",
            'description' =>  $quantities->quantity." Has Deleted Permanently From Quantity Module", 
        );
        AuditLogModel::create($audits);  
        $quantities->forcedelete();
        return back()->with('successdel',"Category Has Been Deleted Pemanently !");
    }

    public function Qstore($id){
        $quantities = QuantityModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $quantities->quantity." Has Restored From Quantity Module", 
          );
        AuditLogModel::create($audits);  
        $quantities->restore();
        return back()->with('restor',"Quantity Has Restore Successfully !");
    }
}
