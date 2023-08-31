<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignModel;
use App\Models\FeaturedModel;
use App\Models\ProductsModel;
use App\Models\TemplatesModel;
use Illuminate\Validation\Rule;
use App\Models\AuditLogModel;

class FeaturedNTemplatesController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Designs-view|Designs-edit|Designs-create|Designs-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Designs-create', ['only' => ['create','store']]);  
        $this->middleware('role_or_permission:Designs-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Designs-delete', ['only' => ['destroy', 'FTarchive']]);
    }
  
  
    public function index(){
 
        $featured = FeaturedModel::orderBy('name')->with(['Products', 'Design'])->get();

        return view('Admin.Preview.FeaturedNTemplates', [
            
            'featured' => $featured

        ]);
   }

   
    public function create(){

        $products = ProductsModel::where('status', "Active")->get();       
        $designs = DesignModel::where('status', "Active")->get();

        return view('Admin.AddPreview.AFTFeatured',[
           'designs' => $designs,
           'products' => $products
         ]);    
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>['required',Rule::unique('design', 'name')],
            'product_id'=>'required',
            'design_id'=>'required',
            'date'=>'required',
            'status' => 'required',
        ]);

        $input = $request->all();   

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->name. " Has Created From Featured Module", 
          );
        AuditLogModel::create($audits);   

           
        FeaturedModel::create($input);  

        return back()->with('successAdd','Featured Added Successfully !');
    }

    public function edit($id){

        $featured = FeaturedModel::findorFail($id);
        $products = ProductsModel::get();       
        $designs = DesignModel::get();

        // Select * from category where id = 1;
        return view('Admin.UpdatePreview.UFeatured',[
            'featured' => $featured,
            'designs' => $designs,
            'products' => $products
        ]);    
    }

    public function update(Request $request, $id){
        $featured = FeaturedModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('featured', 'name')->ignore($featured->id)],
            'product_id'=>'required',
            'design_id'=>'required',
            'date'=>'required',
        ]);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $featured->name." Has Updated to ".$request->name. "  From Featured Module", 
          );
        AuditLogModel::create($audits); 
      
    
        $input = $request->all();
        $featured->update($input);

        return back()->with("successupd","Featured Has Been Updated !");
    }

        public function destroy($id){
            
            $featured = FeaturedModel::findorfail($id);
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete",
                'description' =>  $featured->name." Has Deleted From Featured Module", 
              );
            AuditLogModel::create($audits);  
      
            $featured->delete();
            return back()->with('successdel',"Featured Has Been Deleted !");
        }

        public function show($id){

            $featured = FeaturedModel::get();
            $products = ProductsModel::get();       
            $designs = DesignModel::findorFail($id);
    
            // Select * from category where id = 1;
            return view('Admin.AddPreview.AFeaturedD',[
                'designs' => $designs,
                'featured' => $featured,              
                'products' => $products
            ]);    
        }

        
        public function FTarchive(){
            $featured = FeaturedModel::onlyTrashed()->with(['Products', 'Design'])->get();
            return view('Admin.ArchivePreview.FeaturedARC',[
                'featured' => $featured,      
            ]);
        }

        public function FTdestroy($id){
            $featured = FeaturedModel::onlyTrashed()->findorfail($id);
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $featured->name." Has Deleted Permanently From Featured Module", 
               );
               AuditLogModel::create($audits);  
            $featured->forcedelete();
            return back()->with('successdel',"Featured Has Been Deleted Pemanently !");
        }

        public function FTstore($id){
            $featured = FeaturedModel::onlyTrashed()->findorfail($id);
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Restore : Archives",
                'description' =>  $featured->name." Has Restored From Featured Module", 
              );
              AuditLogModel::create($audits);  
            $featured->restore();
            return back()->with('restor',"Featured Has Restore Successfully !");
        }
}
