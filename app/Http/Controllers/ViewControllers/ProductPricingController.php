<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\PricingTypeModel;
use App\Models\SizeModel;
use Illuminate\Validation\Rule;

class ProductPricingController extends Controller
{
    public function show($id){

        $products = ProductsModel::findorFail($id);
        $sizes = SizeModel::where('status', "Active")->get();
        $pricingtype = PricingTypeModel::where('status', "Active")->get();
    
        return view('Admin.AddPreview.AProductPricingD',[
            'products' => $products,
            'sizes' => $sizes,
            'pricingtype' => $pricingtype
        ]);    
    }
}
