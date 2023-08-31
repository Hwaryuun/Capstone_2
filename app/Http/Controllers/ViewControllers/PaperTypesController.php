<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaperTypeModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class PaperTypesController extends Controller
{

  function __construct()
  {
      $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
      $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
      $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
      $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy', 'ptypeindex']]);
  }
  
  public function index(){

    $papertypes = PaperTypeModel::get();

    return view('Admin.Preview.PaperType',[
     'papertypes' => $papertypes]
  );

  }
   public function create(){

    return view('Admin.AddPreview.APaperTypes');  
  }

 public function store(Request $request){

    $this->validate($request,[
        'name'=> ['required',Rule::unique('papertypes', 'name')],
        'status' => 'required',
    ]);

      $input = $request->all();

      
      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => $request->name. " Has Created From PaperType Module", 
      );
       AuditLogModel::create($audits);   


      PaperTypeModel::create($input);   
      return back()->with('successAdd','Paper Type Added Successfully !');
  }

  public function edit($id){

    $papertypes = PaperTypeModel::findorFail($id);
    // Select * from category where id = 1;

    return view('Admin.UpdatePreview.UPaperTypes',[
        'papertypes' => $papertypes
    ]);    

  }
  
  public function update(Request $request, $id){

    $papertypes = PaperTypeModel::findorFail($id);
    $this->validate($request,[
        'name'=> ['required',Rule::unique('papertypes', 'name')->ignore($papertypes->id)],
        'status' => 'required',
    ]);
   
    $audits = array(
      'user_id' =>  auth()->user()->id,
      'activity' => "Update",
      'description' =>  $papertypes->name." Has Updated to ".$request->name. "  From PaperType Module", 
    );
     AuditLogModel::create($audits); 

    $input = $request->all();
    $papertypes->update($input);
    return back()->with('successupd','Paper Type Has Been Updated !');   

 }
    public function destroy($id){
        
        $papertypes = PaperTypeModel::findorfail($id);

        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete",
          'description' =>  $papertypes->name." Has Deleted From PaperType Module", 
        );
        AuditLogModel::create($audits);  

        $papertypes->delete();
        return back()->with('successdel',"Paper Type Has Been Deleted !");
    }

    
      public function ptypeindex(){
        $papertypes = PaperTypeModel::orderBy('name')->onlyTrashed()->get();
        return view('Admin.ArchivePreview.PaperTypeARC',[
            'papertypes' => $papertypes,      
        ]);
      }

      public function ptypedestroy($id){
          $papertypes = PaperTypeModel::onlyTrashed()->findorfail($id);
          
          try{          
            $audits = array(
              'user_id' =>  auth()->user()->id,
              'activity' => "Delete : Archives",
              'description' =>  $papertypes->name." Has Deleted Permanently From PaperType Module", 
             );
            $papertypes->forcedelete();
            AuditLogModel::create($audits);  
          }catch(exception $e){
              return back()->with('Cannot',"This Paper Type is Connected to another Branch !");
          }

       
          return back()->with('successdel',"Paper Type Has Been Deleted Pemanently !");
      }

      public function ptypetore($id){
          $papertypes = PaperTypeModel::onlyTrashed()->findorfail($id);
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $papertypes->name." Has Restored From PaperType Module", 
          );
          AuditLogModel::create($audits);  
          $papertypes->restore();
          return back()->with('restor',"Paper Type Has Restore Successfully !");
      }

}
