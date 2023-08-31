<?php

namespace App\Http\Controllers\Customers\Page;
use App\Models\TemplatesModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use App\Models\PricingTypeModel;
use App\Models\PricingModel;
use App\Models\SizeModel;
use App\Models\PaperSpecsModel;
use App\Models\PaperTypeModel;
use App\Models\QuantityModel;
use App\Models\LeafModel;
use App\Models\DimentionalModel;
use App\Models\CartModel;
use Exception;

class ShopTemplatesController extends Controller
{
    
    public function ViewTemp($id){
        $templates = TemplatesModel::orderBy('name')->with(['Products', 'Design'])->
        where('product_id', $id)->get();        
        $products = ProductsModel::findorFail($id);  

        return view('Customer.Page.CustomerTemp',['templates'=> $templates, 'products'=>$products ] );
    }
    
    public function SpecsTemps($id ,$id2){
      
        $templates = TemplatesModel::findorfail($id2);        
        $products = ProductsModel::findorFail($id);
        
        
        // $models = DimentionalModel::leftJoin('category', 'category.id', '=', 'dimentionalmodels.category_id')  
        // ->select('dimentionalmodels.*')            
        // ->where('dimentionalmodels.status', "Active")
        // ->get();


        $models = DimentionalModel::with('Category')
        ->where('category_id', $products->Category->id)
        ->where('status', "Active")
        ->get();
       

        $productsg1 = ProductsModel::leftJoin('category', 'category.id', '=', 'products.category_id')  
        ->select('products.*')            
        ->where('products.status', "Active")
        ->get();

        return view('Customer.Page.CustomerSpecsTemp', [
            'products'=>$products, 
            'models'=> $models,  
            'productsg1' =>  $productsg1,
            'templates' =>  $templates]);
    }

    // public function edit($id){
      
    //     return view('Customer.Page.CustomerEditing' );
    // }

}
