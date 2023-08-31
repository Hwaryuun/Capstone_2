<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricingTypeModel;
use App\Models\PricingModel;
use App\Models\SizeModel;
use App\Models\ProductsModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class PricingController extends Controller
{

  
  function __construct()
  {
      $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
      $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
      $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
      $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy','pindex']]);
  }
  
  
    public function index(){

        $pricing = PricingModel::with(['Products', 'Size', 'PricingType'])->get();

        return view('Admin.Preview.Pricing',[
           'pricing' => $pricing
       ]);
   }

   public function create(){
       
    $products = ProductsModel::where('status', "Active")->get();
    $sizes = SizeModel::where('status', "Active")->get();
    $pricingtype = PricingTypeModel::where('status', "Active")->get();

      return view('Admin.AddPreview.APricing',[
        'products' => $products,
        'sizes' => $sizes,
        'pricingtype' => $pricingtype
    ]);  
  }

 public function store(Request $request){

    $this->validate($request,[
       'product_id'=>'required',
       'size_id' =>'required', 
       'pricingtype_id' =>'required', 
       'price' =>'required', 
       'status' =>'required'
    ]);

      $input = $request->all();

      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => "New Product Price Has Created From RetailPrice Module", 
      );
       AuditLogModel::create($audits);   


      PricingModel::create($input);   
      return back()->with('successAdd','Pricing Added Successfully !');
  }

  public function edit($id){

    $prices = PricingModel::findorFail($id);

    $products = ProductsModel::get();
    $sizes = SizeModel::get();
    $pricingtype = PricingTypeModel::get();


    return view('Admin.UpdatePreview.UPricing',[
        'prices' => $prices,
        'products' => $products,
        'sizes' => $sizes,
        'pricingtype' => $pricingtype
    ]);    
  }
  
  public function update(Request $request, $id){

    $prices = PricingModel::findorFail($id);
    $this->validate($request,[
        'product_id'=>'required',
       'size_id' =>'required', 
       'pricingtype_id' =>'required', 
       'price' =>'required', 
    ]);

    $audits = array(
      'user_id' =>  auth()->user()->id,
      'activity' => "Update",
      'description' =>  $prices->Products->name." Price Has Updated From RetailPrice Module", 
    );
     AuditLogModel::create($audits); 

     
    $input = $request->all();
    $prices->update($input);
    return back()->with('successupd','Pricing Has Been Updated !');   

 }
    public function destroy($id){
        
        $prices = PricingModel::findorFail($id);

        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete",
          'description' =>  $prices->Products->name." Price Has Deleted From RetailPrice Module", 
        );
        AuditLogModel::create($audits);  

        $prices->delete();
        return back()->with('successdel',"Pricing Has Been Deleted !");
    }

    public function pindex(){
      $pricing = PricingModel::onlyTrashed()->with(['Products', 'Size', 'PricingType'])->get();
      return view('Admin.ArchivePreview.PricingARC',[
          'pricing' => $pricing,      
      ]);
    }

    public function pdestroy($id){
        $pricing = PricingModel::onlyTrashed()->findorfail($id);

        try{          
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete : Archives",
            'description' => $pricing->Products->name." Has Deleted Permanently From RetailPrice Module", 
           );
          $pricing->forcedelete();
          AuditLogModel::create($audits);  
        }catch(exception $e){
            return back()->with('Cannot',"This Paper Type is Connected to another Branch !");
        }


  
        return back()->with('successdel',"Pricing Has Been Deleted Pemanently !");
    }

    public function pstore($id){
        $pricing = PricingModel::onlyTrashed()->findorfail($id);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Restore : Archives",
          'description' => $pricing->Products->name." Has Restored From RetailPrice Module", 
        );
        AuditLogModel::create($audits);  
        $pricing->restore();
        return back()->with('restor',"Pricing Has Restore Successfully !");
    }
}
