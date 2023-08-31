<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeafModel;
use App\Models\CategoryModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class LeafQuantityController extends Controller
{

  function __construct()
  {
      $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
      $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
      $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
      $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy','LQindex']]);
  }
  


  public function index(){
    $leafs = LeafModel::orderBy('value')->with('Category')->get();
    return view('Admin.Preview.QuantityLeaf', [
        'leafs' => $leafs
    ]);
   }

    public function create(){

        $category = CategoryModel:: where('status', "Active") ->get();
    
          return view('Admin.AddPreview.ALeaf',[
            'category' => $category, 
         ]);  
       }
    
     public function store(Request $request){
    
        $this->validate($request,[
            'quantity' => 'required',
            'value' => 'required',
            'category_id'=>'required',
            'status' => 'required',
        ]);
    
            $input = $request->all();

            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Create",
                'description' => $request->quantity. " Has Created From Quantity-Page Module", 
              );
            AuditLogModel::create($audits);   

               
            LeafModel::create($input);   
            return back()->with('successAdd','Quantity Leaf Added Successfully !');
        }
    
      public function edit($id){
    
          $leafs = LeafModel::findorFail($id);
          // Select * from category where id = 1;  
          $category = CategoryModel::get();

          return view('Admin.UpdatePreview.ULeaf',[
              'leafs' => $leafs,
              'category' => $category
          ]);    
      
      }
    
      public function update(Request $request, $id){
    
          $leafs = LeafModel::findorFail($id);
          $this->validate($request,[
            'quantity' => 'required',
            'value' => 'required',
            'category_id'=>'required',
            'status' => 'required',
          ]);
         
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $leafs->quantity." Has Updated to ".$request->quantity. "  From Quantity-Page Module", 
          );
           AuditLogModel::create($audits); 
      
    
          $input = $request->all();
          $leafs->update( $input);
    
          return back()->with('successupd','Quantity Leaf Has Been Updated !');   
      
      }
    
      
      public function destroy($id){
          
          $leafs = LeafModel::findorFail($id);

          
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $leafs->quantity." Has Deleted From Quantity-Page Module", 
          );
          AuditLogModel::create($audits);  

          
          $leafs->delete();
          return back()->with('successdel',"Quantity Leaf Has Been Deleted !");
      }

      public function LQindex(){
        $leafs = LeafModel::onlyTrashed()->with('Category')->get();
        return view('Admin.ArchivePreview.LeafARC',[
            'leafs' => $leafs,      
        ]);
      }

      public function LQdestroy($id){
          $leafs = LeafModel::onlyTrashed()->findorfail($id);
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete : Archives",
            'description' =>  $leafs->quantity." Has Deleted Permanently From Quantity-Page Module", 
           );
           AuditLogModel::create($audits);  
          $leafs->forcedelete();
          return back()->with('successdel',"Quantity Leaf Has Been Deleted Pemanently !");
      }

      public function LQstore($id){
          $leafs = LeafModel::onlyTrashed()->findorfail($id);
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $leafs->quantity." Has Restored From Quantity-Page Module", 
          );
          AuditLogModel::create($audits);  
          $leafs->restore();
          return back()->with('restor',"Quantity Leaf Has Restore Successfully !");
      }
}
