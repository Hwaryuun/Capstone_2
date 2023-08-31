<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignModel;
use App\Models\TemplatesModel;
use App\Models\ProductsModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class TemplatesController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Designs-view|Designs-edit|Designs-create|Designs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Designs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Designs-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Designs-delete', ['only' => ['destroy','TPLarchive']]);
    }
  
  

    public function index(){

        $templates = TemplatesModel::orderBy('name')->with(['Products', 'Design'])->get();


        return view('Admin.Preview.Templates', [
            'templates' => $templates,
        ]);
   }

    public function create(){

        $products = ProductsModel::where('status', "Active")->get();       
        $designs = DesignModel::where('status', "Active")->get();

        return view('Admin.AddPreview.AFTTEmplate',[
           'designs' => $designs,
           'products' => $products
         ]);    
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>['required',Rule::unique('templates', 'tag')],
            'tag'=>'required',
            'product_id'=>'required',
            'design_id'=>'required',     
            'status' => 'required',
        ]);

        $input = $request->all();   

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->name. " Has Created From Templates Module", 
          );
        AuditLogModel::create($audits);   

           
        TemplatesModel::create($input);  

        return back()->with('successAdd','Templates Added Successfully !');
    }

    public function edit($id){

        $templates = TemplatesModel::findorFail($id);
        $products = ProductsModel::get();       
        $designs = DesignModel::get();

        // Select * from category where id = 1;
        return view('Admin.UpdatePreview.UTemplates',[
            'templates' => $templates,
            'designs' => $designs,
            'products' => $products
        ]);    
    }

    public function update(Request $request, $id){
        $templates = TemplatesModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('templates', 'tag')->ignore($templates->id)],
            'tag'=>'required',
            'product_id'=>'required',
            'design_id'=>'required',
           
        ]);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $templates->name." Has Updated to ".$request->name. "  From Templates Module", 
          );
        AuditLogModel::create($audits); 
      
    
        $input = $request->all();
        $templates->update($input);

        return back()->with("successupd","Templates Has Been Updated !");
    }

    public function destroy($id){
            
        $templates = TemplatesModel::findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $templates->name." Has Deleted From Templates Module", 
        );
        AuditLogModel::create($audits);  

          
        $templates->delete();
        return back()->with('successdel',"Templates Has Been Deleted !");
    }

    public function show($id){

        $templates = TemplatesModel::get();
        $products = ProductsModel::get();       
        $designs = DesignModel::findorFail($id);

        // Select * from category where id = 1;
        return view('Admin.AddPreview.ATemplateD',[
            'designs' => $designs,
            'featured' => $templates,              
            'products' => $products
        ]);    
    }

    public function TPLarchive(){
        $templates = TemplatesModel::onlyTrashed()->with(['Products', 'Design'])->get();
        return view('Admin.ArchivePreview.TemplatesARC',[
            'templates' => $templates,      
        ]);
    }

    public function TPLdestroy($id){

        $templates = TemplatesModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete : Archives",
            'description' =>  $templates->name." Has Deleted Permanently From Templates Module", 
        );
        AuditLogModel::create($audits); 
        $templates->forcedelete();   
        return back()->with('successdel',"Templates Has Been Deleted Pemanently !");
    }

    public function TPLstore($id){
        $templates = TemplatesModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $templates->name." Has Restored From Templates Module", 
          );
        AuditLogModel::create($audits);  
        $templates->restore();
        return back()->with('restor',"Templates Has Restore Successfully !");
    }
}
