<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Models\SizeModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class SizeController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Specs-view|Specs-edit|Specs-create|Specs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Specs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Specs-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Specs-delete', ['only' => ['destroy','szindex']]);
    }


    public function index(){
        $sizes = SizeModel::get();
        return view('Admin.Preview.Size', ['sizes' => $sizes] );
   }

   
   public function create(){

    return view('Admin.AddPreview.ASize');  
}

 public function store(Request $request){

  $this->validate($request,[
        'length' => 'required',
        'width' => 'required',
        'status' => 'required',
  ]);

  
    $input = $request->all();

    $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => $request->length. " x ". $request->width." Has Created From Size Module", 
      );
    AuditLogModel::create($audits);   



    SizeModel::create($input);   
    return back()->with('successAdd','Size Added Successfully !');
}

  public function edit($id){

      $sizes = SizeModel::findorFail($id);
      // Select * from category where id = 1;

      return view('Admin.UpdatePreview.USize',[
          'sizes' => $sizes,
      ]);    
  
  }

  public function update(Request $request, $id){

      $sizes = SizeModel::findorFail($id);
      $this->validate($request,[
        'length' => 'required',
         'width' => 'required',
      ]);
     
      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Update",
        'description' =>  $sizes->length. " x ". $sizes->width." Has Updated to ".$request->length. " x ". $request->width. "  From Size Module", 
      );
       AuditLogModel::create($audits); 

       
      $input = $request->all();
      $sizes->update( $input);

      return back()->with('successupd','Size Has Been Updated !');   
  
  }

  
  public function destroy($id){
      
      $sizes = SizeModel::findorfail($id);
      
      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Delete",
        'description' =>   $sizes->length. " x ". $sizes->width." Has Deleted From Size Module", 
      );
      AuditLogModel::create($audits);  

      $sizes->delete();
      return back()->with('successdel',"Size Has Been Deleted !");
  }
  
    public function szindex(){
        $sizes = SizeModel::onlyTrashed()->get();
        return view('Admin.ArchivePreview.SizeARC',[
            'sizes' => $sizes,      
        ]);
    }

    public function szdestroy($id){
        $sizes = SizeModel::onlyTrashed()->findorfail($id);
    
        try{          
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>   $sizes->length. " x ". $sizes->width." Has Deleted Permanently From Size Module", 
               );
            $sizes->forcedelete();
            AuditLogModel::create($audits);  
          }catch(exception $e){
              return back()->with('Cannot',"This Size is Connected to another Branch !");
          }

        return back()->with('successdel',"Size Has Been Deleted Pemanently !");
    }

    public function sztore($id){
        $sizes = SizeModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $sizes->length. " x ". $sizes->width." Has Restored From Size Module", 
          );
          AuditLogModel::create($audits);  
        $sizes->restore();
        return back()->with('restor',"Size Has Restore Successfully !");
    }
}
