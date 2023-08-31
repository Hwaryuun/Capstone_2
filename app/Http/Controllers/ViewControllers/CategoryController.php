<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreCategoryRequest;
use Exception;
use phpDocumentor\Reflection\Types\Nullable;
use App\Models\AuditLogModel;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Category-view|Category-edit|Category-create|Category-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Category-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Category-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Category-delete', ['only' => ['destroy','archiveindex']]);
    }
  
  
    public function index(){
         $category = CategoryModel::orderBy('name')->with('CategoryType')->get();
         
         return view('Admin.Preview.Category',[
            'category' => $category,
        ]);
    }
    // one to many category type -> to category

    public function create(){

        $cattypedata = CategoryTypeModel::orderBy('typename')
                    ->select('id', 'typename')
                    ->where('status', "Active")
                    ->get();

        return view('Admin.AddPreview.ACategory',['cattypedata' => $cattypedata]);    
    }
    
    public function store(StoreCategoryRequest $request){

        //  $request->validated();
          $this->validate($request,[
            'name'=>['required',Rule::unique('category', 'name')],
            'description' => 'required',
            'categorytype_id'=>'required',
            'status' => 'required',
          ]);

           $input = $request->all();
          
          if($image = $request->file('image')) {
            $destination = 'images/Category_img';
            $pimage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destination,$pimage);
            $input['image'] = "$pimage";
          }
         
          CategoryModel::create($input);   

          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->name. " Has Created From Category Module", 
          );
           AuditLogModel::create($audits);   

          return back()->with('successAdd','Category Added Successfully !');
    }

    public function edit($id){

        $category = CategoryModel::findorFail($id);
        // Select * from category where id = 1;
    
        $cattypedata = CategoryTypeModel::orderBy('typename')
        ->select('id', 'typename')
        ->get();

        return view('Admin.UpdatePreview.UCategory',[
            'category' => $category,
            'cattypedata' => $cattypedata
        ]);  

    }
    public function update(Request $request, $id){
        $category = CategoryModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('category', 'name')->ignore($category->id)],
            'description' => 'required',
            'categorytype_id'=>'required',
            'status' => 'required',
        ]);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $category->name." Has Updated to ".$request->name. "  From Category Module", 
          );
        AuditLogModel::create($audits);  
       
      /*  $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->type = $request->input('type');
        $category->status = $request->input('status');*/
        $input = $request->all();
        
        if($image = $request->file('image')) {
          $destination = 'images/Category_img';
          $pimage = date('YmdHis').".".$image->getClientOriginalExtension();
          $image->move($destination,$pimage);
          $input['image'] = "$pimage";
        
         }else{
          unset($input['image']);
         }
          
        $category->update( $input);

        return back()->with('successupd','Category Has Been Updated !');
    }

    public function destroy($id){
        
        $category = CategoryModel::findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $category->name." Has Deleted From Category Module", 
          );
        AuditLogModel::create($audits);  

        $category->delete();
        return back()->with('successdel',"Category Has Been Deleted !");

    }

    public function show($id){

        $category = CategoryModel::findorFail($id);
        return view('Admin.Preview.CategoryShow',[ 'category' => $category]);    
        
    }

    public function archiveindex(){
        $category = CategoryModel::orderBy('name')->onlyTrashed()->with('CategoryType')->get();
        return view('Admin.ArchivePreview.CategoryARC',[
            'category' => $category,      
        ]);
    }

    public function destroycategory($id){
        $category = CategoryModel::onlyTrashed()->findorfail($id); 

        try{   
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $category->name." Has Deleted Permanently From Services Module", 
            );
            $category->forcedelete();
            AuditLogModel::create($audits);   
        }catch(exception $e){
            return back()->with('Cannot',"This Category is Connected to another Branch !");
        }
    
        return back()->with('successdel',"Category Has Been Deleted Pemanently !");
    }

    public function restorecategory($id){
        $category = CategoryModel::onlyTrashed()->findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $category->name." Has Restored From Services Module", 
        );

        AuditLogModel::create($audits); 

        $category->restore();
        return back()->with('restor',"Category Has Restore Successfully !");
    }
}
