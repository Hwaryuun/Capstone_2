<?php

namespace App\Http\Controllers\Customers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\FeaturedModel;
use App\Models\ProductsModel;

class ShopController extends Controller
{
       
    public function index(){
  
        $featured = FeaturedModel::orderBy('name')->with(['Products', 'Design'])->where('status', "Active")->get();

        return view('Customer.Page.CustomerCategory',[
            'featured' => $featured
        ]);
    }
    
}
