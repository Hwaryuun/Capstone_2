<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PapersModel;
use App\Models\PaperTypeModel;
use App\Models\PaperSpecsModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class PapersController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy', 'papersindex']]);
    }
    
    public function index(){

        $papers = PapersModel::orderBy('name')->get();

        return view('Admin.Preview.Papers',[
         'papers' => $papers]
    );

}

public function create(){

    return view('Admin.AddPreview.APapers');  
}

 public function store(Request $request){

    $this->validate($request,[
        'name'=> ['required',Rule::unique('papers', 'name')],
        'status' => 'required',
    ]);

      $input = $request->all();
      PapersModel::create($input);   

      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => $request->name. " Has Created From PaperStock Module", 
      );
       AuditLogModel::create($audits);   


      return back()->with('successAdd','Paper Stock Added Successfully !');
  }

  public function edit($id){

    $papers = PapersModel::findorFail($id);
    // Select * from category where id = 1;


    return view('Admin.UpdatePreview.UPapers',[
        'papers' => $papers
    ]);    

  }
  
  public function update(Request $request, $id){

    $papers = PapersModel::findorFail($id);
    $this->validate($request,[
        'name'=> ['required',Rule::unique('papers', 'name')->ignore($papers->id)],
        'status' => 'required',
    ]);
   
    $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Update",
        'description' =>  $papers->name." Has Updated to ".$request->name. "  From PaperStock Module", 
      );
    AuditLogModel::create($audits);  

    $input = $request->all();
    $papers->update($input);
    return back()->with('successupd','Paper Stock Has Been Updated !');   

 }
    public function destroy($id){
        
        $papers = PapersModel::findorfail($id);    

             
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $papers->name." Has Deleted From PaperStock Module", 
          );
        AuditLogModel::create($audits);  


        $papers->delete();   
        return back()->with('successdel',"Paper Stock Has Been Deleted !");
    }

    public function papersindex(){
        $papers = PapersModel::orderBy('name')->onlyTrashed()->get();
        return view('Admin.ArchivePreview.PaperStockARC',[
            'papers' => $papers,      
        ]);
    }

    public function paperdestroy($id){
        $papers = PapersModel::onlyTrashed()->findorfail($id);

          try{  
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $papers->name." Has Deleted Permanently From PaperStock Module", 
            );        
            $papers->forcedelete();
            AuditLogModel::create($audits);  
          }catch(exception $e){
              return back()->with('Cannot',"This Paper Stock is Connected to another Branch !");
          }
        return back()->with('successdel',"Paper Stock Has Been Deleted Pemanently !");
    }

    public function paperstore($id){
        $papers = PapersModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $papers->name." Has Restored From PaperStock Module", 
        );
        AuditLogModel::create($audits);  
        $papers->restore();
        return back()->with('restor',"Paper Stock Has Restore Successfully !");
    }
}


