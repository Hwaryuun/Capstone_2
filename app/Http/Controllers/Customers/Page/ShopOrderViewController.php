<?php

namespace App\Http\Controllers\Customers\Page;

use App\Http\Controllers\Controller;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use App\Models\PricingTypeModel;
use App\Models\PricingModel;
use App\Models\SizeModel;
use App\Models\PaperSpecsModel;
use App\Models\PaperTypeModel;
use App\Models\QuantityModel;
use App\Models\LeafModel;
use App\Models\CartModel;
use App\Models\CartPriceModel;
use App\Models\TemplatesModel;
use Exception;
use Illuminate\Http\Request;

class ShopOrderViewController extends Controller
{
    public function OrderSummary(Request $orderreq, $id){

        $this->validate($orderreq,[    
            'Size' => 'required',
            'Paper1' => 'required',
            'quantity' => 'required',
        ]);

        $products = ProductsModel::findorFail($id);
        $sizes = PricingModel::findorFail($orderreq->Size);
        $quantitys = QuantityModel::findorFail($orderreq->quantity);
        $specs = PaperSpecsModel::findorFail($orderreq->Paper1);

        $counter = ($quantitys->value * $sizes->price);
        $counter2 = ($quantitys->value * $specs->value);

        try{
            $leafs =  LeafModel::findorFail($orderreq->leaf); 
            $specovers = PaperSpecsModel::findorFail($orderreq->Paper2);  

            $counter3 = ($quantitys->value * $leafs->value);
            $counter4 = ($quantitys->value * $specovers->value);
         
        }catch(exception $e){

            $leafs = "";
            $specovers = "";
            $counter3 = 0;
            $counter4 = 0;
        }
      
        if($counter3 != 0 && $counter4 != 0){
            $result =   $counter2 + $counter + $counter3 + $counter4;
        }else{
            $result =   $counter2 + $counter;
        }

        $resulthalf =  $result / 2;
        $templates = "";
        
        return view('Customer.Page.CustumerOrderView', 
            [
             'sizes' => $sizes, 
             'quantitys' => $quantitys, 
             'specs' => $specs,
             'products' => $products,       
             'leafs' => $leafs,
             'specovers' => $specovers,
             'result' =>  $result,  'resulthalf' =>  $resulthalf,   'templates'=>$templates]);
    } //



    public function OrderSummaryV2(Request $orderreq, $id){

        $this->validate($orderreq,[    
            'Size' => 'required',
            'Paper1' => 'required',
            'quantity' => 'required',
        ]);

        $products = ProductsModel::findorFail($id);
        $sizes = PricingModel::findorFail($orderreq->Size);
        $quantitys = QuantityModel::findorFail($orderreq->quantity);
        $specs = PaperSpecsModel::findorFail($orderreq->Paper1);
        $templates = TemplatesModel::findorfail($orderreq->tempi);        
 

        $counter = ($quantitys->value * $sizes->price);
        $counter2 = ($quantitys->value * $specs->value);

        try{
            $leafs =  LeafModel::findorFail($orderreq->leaf); 
            $specovers = PaperSpecsModel::findorFail($orderreq->Paper2);  

            $counter3 = ($quantitys->value * $leafs->value);
            $counter4 = ($quantitys->value * $specovers->value);
         
        }catch(exception $e){

            $leafs = "";
            $specovers = "";
            $counter3 = 0;
            $counter4 = 0;
        }
      
        if($counter3 != 0 && $counter4 != 0){
            $result =   $counter2 + $counter + $counter3 + $counter4;
        }else{
            $result =   $counter2 + $counter;
        }

        $resulthalf =  $result / 2;
     
        
        return view('Customer.Page.CustumerOrderView', 
            [
             'sizes' => $sizes, 
             'quantitys' => $quantitys, 
             'specs' => $specs,
             'products' => $products,       
             'leafs' => $leafs,
             'specovers' => $specovers,
             'result' =>  $result,  'resulthalf' =>  $resulthalf,
             'templates' =>   $templates]);
    } //


    public function CartAdd(Request $cart){


        $sei = CartPriceModel::create([
            'sizeprice' =>  $cart->sizeprices, 
            'defaultprice'=> $cart->defaultprices,
            'coverprice' => $cart->coverprizes, 
            'leafprice' => $cart->leafprizes, 
            'quantity' => $cart->qtty, 
        ]); 

        if($file = $cart->file('uploading')) {

            $destination = 'images/Clientfile_img';
            $pimage =  auth('customer')->user()->firstname." Design ".date('YmdHis').".".$file->getClientOriginalExtension();
            $file->move($destination,$pimage);
            $input['uploading'] = "$pimage";


            $cartings = array(
                'customer_id' => auth('customer')->user()->id,
                'pricing_id' => $cart->size,
                'cartprice_id' =>  $sei->id,
                'paperdefault' => $cart->default,
                'quantity' => $cart->quantity,
                'cover' => $cart->cover,
                'page' => $cart->leaf,
                'files' => $input['uploading'],
                'status' => "cart0",
                'price' => $cart->total,
            );
    
        }
        else{

            $cartings = array(
                'customer_id' => auth('customer')->user()->id,
                'pricing_id' => $cart->size,
                'cartprice_id' =>  $sei->id,
                'paperdefault' => $cart->default,
                'quantity' => $cart->quantity,
                'cover' => $cart->cover,
                'page' => $cart->leaf,
                'files' => $cart->uploading,
                'status' => "cart0",
                'price' => $cart->total,
            );


        }
     
  
         CartModel::create($cartings);  
         return redirect()->route('quotation', $cart->prodid)->with('successAdd',' Product Added to Cart !');     
    }
}


// dd($cart->size, $cart->default,  $cart->cover, $cart->prodid  $cart->leaf,  $cart->quantity, auth('customer')->user()->firstname);
// $sizes = PricingModel::with(['Products', 'Size', 'PricingType']) ->where('id', $orderreq->Size) ->get();
// $quantitys = QuantityModel::with(['CategoryType', 'PricingType']) ->where('id', $orderreq->quantity) ->get();
// $specs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes']) ->where('id', $orderreq->Paper1) ->get();  
// $specovers = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes']) ->where('id', 0) ->get();  
// $leafs = LeafModel::with('Category')->where('id',0) ->get();
// $leafs =  LeafModel::findorFail(0); 
// $specovers = PaperSpecsModel::findorFail(0);  
//experiment 1 success