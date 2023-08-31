<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PapersModel;
use App\Models\PaperTypeModel;
use App\Models\PaperSpecsModel;
use App\Models\CategoryModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class PaperSpecsController extends Controller
{

  function __construct()
  {
      $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
      $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
      $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
      $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy', 'spcindex']]);
  }
  
  
  public function index(){

    $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])->get();
    return view('Admin.Preview.Specs',[
     'paperspecs' => $paperspecs]
    );

  }
    public function create(){
       
        $category = CategoryModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

        $papers = PapersModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

        $papertypes = PaperTypeModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

          return view('Admin.AddPreview.APaperSpecs',[
            'category' => $category,
            'papers' => $papers,
            'papertypes' => $papertypes
        ]);  
      }
    
     public function store(Request $request){
    
        $this->validate($request,[
           'category_id'=>'required',
           'papers_id' =>'required', 
           'papertypes_id' =>'required', 
           'lbs' =>'required', 
           'value' => 'required',
           'quantity' =>'required', 
           'status' =>'required'
        ]);

          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => " New Specs Has Created From PaperSpecs Module", 
          );
          AuditLogModel::create($audits);   
    

          $input = $request->all();
          PaperSpecsModel::create($input);   
          return back()->with('successAdd','Paper Specs Added Successfully !');
      }
    
      public function edit($id){
    
        $paperspecs = PaperSpecsModel::findorFail($id);

        $category = CategoryModel::orderBy('name')
        ->select('id', 'name')
        ->get();

        $papers = PapersModel::orderBy('name')
        ->select('id', 'name')
        ->get();

        $papertypes = PaperTypeModel::orderBy('name')
        ->select('id', 'name')
        ->get();

        return view('Admin.UpdatePreview.UPaperSpecs',[
            'paperspecs' => $paperspecs,
            'category' => $category,
            'papers' => $papers,
            'papertypes' => $papertypes
        ]);    
    
      }
      
      public function update(Request $request, $id){
    
        $paperspecs = PaperSpecsModel::findorFail($id);
        $this->validate($request,[
           'category_id'=>'required',
           'papers_id' =>'required', 
           'papertypes_id' =>'required', 
           'lbs' =>'required', 
           'value' => 'required',
           'quantity' =>'required',
           'status' =>'required'        
        ]);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Update",
          'description' =>  $paperspecs->Category->name." Specs Has Updated From PaperSpecs Module", 
        );
        AuditLogModel::create($audits); 

         
        $input = $request->all();
        $paperspecs->update($input);
        return back()->with('successupd','Paper Specs Has Been Updated !');   
    
     }
    public function destroy($id){
        
        $paperspecs = PaperSpecsModel::findorfail($id);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete",
          'description' => $paperspecs->Category->name." Specs Has Deleted From PaperSpecs Module", 
        );
        AuditLogModel::create($audits);  
        $paperspecs->delete();
        return back()->with('successdel',"Paper Specs Has Been Deleted !");
    }

    public function spcindex(){
      $paperspecs = PaperSpecsModel::onlyTrashed()->with(['Category', 'Papers', 'PaperTypes'])->get();
      return view('Admin.ArchivePreview.SpecsARC',[
          'paperspecs' => $paperspecs,      
      ]);
    }

    public function spcdestroy($id){
        $paperspecs = PaperSpecsModel::onlyTrashed()->findorfail($id);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete : Archives",
          'description' =>   $paperspecs->Category->name." Specs Has Deleted Permanently From PaperSpecs Module", 
        );
        AuditLogModel::create($audits);  
        $paperspecs->forcedelete();
        return back()->with('successdel',"Paper Specs Has Been Deleted Pemanently !");
    }

    public function spcstore($id){
        $paperspecs = PaperSpecsModel::onlyTrashed()->findorfail($id);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Restore : Archives",
          'description' =>  $paperspecs->Category->name." Specs Has Restored From PaperSpecs Module", 
        );
        AuditLogModel::create($audits);  
        $paperspecs->restore();
        return back()->with('restor',"Paper Specs Has Restore Successfully !");
    }
}
