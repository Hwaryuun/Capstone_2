<?php

namespace App\Http\Controllers\Customers\Page;

use App\Models\ProductsModel;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function SProducts($id){

        $category = CategoryModel::findorFail($id);
        $products = ProductsModel::orderBy('name')->with('Category')
        ->where('category_id', $id)
        ->where('status', "Active")
        ->get();

        return view('Customer.Page.CustomerProducts', 
        ['products' => $products,
         'category' => $category]);
    }
}
