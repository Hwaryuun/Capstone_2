<?php

namespace App\Http\Controllers\Customers\Page;
use App\Models\FeaturedModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sample;
use App\Models\DimentionalModel;
use App\Models\TemplatesModel;

class HeroController extends Controller
{
    public function index(){
        $featured = FeaturedModel::orderBy('name')->with(['Products', 'Design'])->where('status', "Active")->get();


        return view('Customer.Page.Hero', ['featured'=>$featured]);
    }

    public function Infos(){
        return view('Information');
    }

 
    public function store(Request $request){
        Mail::to('papirochomechanics@gmail.com')
        ->send(new Sample());
        return back();
    }

    public function DSProducts($prod){

        $products = ProductsModel::findorFail($prod);
        
       
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

        return view('Customer.Page.HeroPreview', ['products'=>$products, 'models'=> $models,  'productsg1' =>  $productsg1]);
    }

    public function DSTemplates($prod){

        $templates = TemplatesModel::orderBy('name')->with(['Products', 'Design'])->
        where('product_id', $prod)->get();        
 

        return view('Customer.Page.HeroTemp', ['templates'=>$templates]);
    }
}
