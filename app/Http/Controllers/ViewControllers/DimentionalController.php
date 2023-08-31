<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DimentionalModel;
use App\Models\CategoryModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class DimentionalController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Models-view|Models-edit|Models-create|Models-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Models-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Models-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Models-delete', ['only' => ['destroy', 'DMindex']]);
    }
    public function index(){

        $models = DimentionalModel::orderBy('name')->with('Category')->get(); //     $models = DimentionalModel::get();
        return view('Admin.Preview.Models', ['models' => $models]);
   }

   public function create(){

    $category = CategoryModel::orderBy('name')
    ->select('id', 'name')
    ->where('status', "Active")
    ->get();
     
    return view('Admin.AddPreview.AModels',['category' => $category ]);  
  }

  public function store(Request $request){

 
    $this->validate($request,[
        'name'=>['required',Rule::unique('dimentionalmodels', 'name')],
        'category_id'=>'required',
        'model'=>'required',
        'status' => 'required',
    ]);

      $input = $request->all();

      if($models = $request->file('model')) {
        $destination = 'images/3DModels_GLB';
        $pimage = date('YmdHis').".".$models->getClientOriginalExtension();
        $models->move($destination,$pimage);
        $input['model'] = "$pimage";
      }

      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => $request->name. " Has Created From 3D Models Module", 
      );
       AuditLogModel::create($audits);   


     
      DimentionalModel::create($input);   
      return back()->with('successAdd','Model Added Successfully!');
  }

  public function edit($id){
    $models = DimentionalModel::findorFail($id);
    // Select * from category where id = 1;

    $category = CategoryModel::orderBy('name')
    ->select('id', 'name')
    ->get();

    return view('Admin.UpdatePreview.UModels',[
        'models' => $models,
        'category' => $category
    ]);    
  }

  public function update(Request $request, $id){

    $modeld = DimentionalModel::findorFail($id);

    $this->validate($request,[
        'name'=>['required',Rule::unique('dimentionalmodels', 'name')->ignore($modeld->id)],
        'category_id'=>'required',
        'status' => 'required',
    ]);

    $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Update",
        'description' =>  $modeld->name." Has Updated to ".$request->name. "  From 3D Models Module", 
      );
    AuditLogModel::create($audits); 
  
   
    $input = $request->all();
          
        if($mdl = $request->file('model')) {
            $destination = 'images/3DModels_GLB';
            $mdls = date('YmdHis').".".$mdl->getClientOriginalExtension();
            $mdl->move($destination,$mdls);
            $input['model'] = "$mdls";
          
           }else{
            unset($input['model']);
           }

        $modeld->update($input);
        return back()->with('successupd','Model Has Been Updated !');   

    }

    public function destroy($id){
        
        $models = DimentionalModel::findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $models->name." Has Deleted From  3D Models Module", 
          );
        AuditLogModel::create($audits);  
  
        $models->delete();
        return back()->with('successdel',"Model Has Been Deleted !");
    }

    public function DMindex(){
      $models = DimentionalModel::onlyTrashed()->with('Category')->get();
      return view('Admin.ArchivePreview.DimentionalARC',[
          'models' => $models,      
      ]);
   }

    public function DMdestroy($id){
        $models = DimentionalModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete : Archives",
            'description' =>  $models->name." Has Deleted Permanently From 3D Models Module", 
           );
        $models->forcedelete();
        AuditLogModel::create($audits); 
        return back()->with('successdel',"Model Has Been Deleted Pemanently !");
    }

    public function DMstore($id){
        $models = DimentionalModel::onlyTrashed()->findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $models->name." Has Restored From 3D Models Module", 
          );
        AuditLogModel::create($audits);  
        $models->restore();
        return back()->with('restor',"Model Has Restore Successfully !");
    }
    
}
