<?php
namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Validation\Rule;
use Exception;
use App\Models\AuditLogModel;

class ProductsController extends Controller
{   //

    function __construct()
    {
        $this->middleware('role_or_permission:Products-view|Products-edit|Products-create|Products-delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Products-edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Products-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Products-delete', ['only' => ['destroy','productsindex']]);
    }
  

    public function index(){

        $products = ProductsModel::orderBy('name')->with('Category')->get();

        return view('Admin.Preview.Products', ['products' => $products]);
   }

   public function create(){

      $category = CategoryModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

      return view('Admin.AddPreview.AProduct',['category' => $category ]);  
   }

   public function store(Request $request){

    $this->validate($request,[
        'name'=>['required',Rule::unique('products', 'name')],
        'description' => 'required',
        'category_id'=>'required',
        'status' => 'required',
        'image'=>'required',
        'eproduction' => 'required',
    ]);

      $input = $request->all();

      if($image = $request->file('image')) {
        $destination = 'images/Product_img';
        $pimage = date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destination,$pimage);
        $input['image'] = "$pimage";
      }
     
      ProductsModel::create($input);   

      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Create",
        'description' => $request->name. " Has Created From Products Module", 
      );
       AuditLogModel::create($audits);   

      return back()->with('successAdd','Products Added Successfully !');
  }

    public function edit($id){

        $products = ProductsModel::findorFail($id);
        // Select * from category where id = 1;

        $category = CategoryModel::orderBy('name')
        ->select('id', 'name')
        ->get();


        return view('Admin.UpdatePreview.UProduct',[
            'products' => $products,
            'category' => $category
        ]);    
    
    }

    public function update(Request $request, $id){

        $products = ProductsModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('products', 'name')->ignore($products->id)],
            'description' => 'required',
            'category_id'=>'required',     
            'eproduction' => 'required',
            'status' => 'required',
        ]);
       

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Update",
            'description' =>  $products->name." Has Updated to ".$request->name. "  From Products Module", 
          );
        AuditLogModel::create($audits);  

        $input = $request->all();
        
        if($image = $request->file('image')) {
          $destination = 'images/Product_img';
          $pimage = date('YmdHis').".".$image->getClientOriginalExtension();
          $image->move($destination,$pimage);
          $input['image'] = "$pimage";
        
         }else{
          unset($input['image']);
         }
          
         
        $products->update( $input);

        return back()->with('successupd','Products Has Been Updated !');   
    
    }

    
    public function destroy($id){
        
        $products = ProductsModel::findorfail($id);

        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Delete",
            'description' =>  $products->name." Has Deleted From Products Module", 
          );
        AuditLogModel::create($audits);  



        $products->delete();
        return back()->with('successdel',"Products Has Been Deleted !");
    }

    public function show($id){

        $products = ProductsModel::findorFail($id);
        // Select * from category where id = 1;
        return view('Admin.Preview.ProductsShow',['products' => $products]);    
    
    }

    
    public function productsindex(){
        $products = ProductsModel::orderBy('name')->onlyTrashed()->with('Category')->get();
        return view('Admin.ArchivePreview.ProductARC',[
            'products' => $products,      
        ]);
    }
    
    public function productsdestroy($id){
        $products = ProductsModel::onlyTrashed()->findorfail($id);

          try{          
            $audits = array(
                'user_id' =>  auth()->user()->id,
                'activity' => "Delete : Archives",
                'description' =>  $products->name." Has Deleted Permanently From Products Module", 
            );
            $products->forcedelete();
            AuditLogModel::create($audits);    
          }catch(exception $e){
              return back()->with('Cannot',"This Products is Connected to another Branch !");
          }
    
          
        return back()->with('successdel',"Products Has Been Deleted Pemanently !");
    }

    public function productsstore($id){
        $products = ProductsModel::onlyTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Restore : Archives",
            'description' =>  $products->name." Has Restored From Products Module", 
        );
        AuditLogModel::create($audits);  
        $products->restore();
        return back()->with('restor',"Products Has Restore Successfully !");
    }

}
