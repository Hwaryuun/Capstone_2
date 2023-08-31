<?php

namespace App\Http\Controllers\Customers\Page;

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
use App\Models\CartPriceModel;
use Exception;
use Illuminate\Support\Facades\DB;
 
class ShopSpecificationController extends Controller
{
    public function index(){
         // $sum = DB::table('usercart')->where('customer_id', auth('customer')->user()->id)->sum('price');

        //, ['cart' => $cart] $cart = CartModel::with(['ClientAcc','ProductPricing'])->where('customer_id', auth('customer')->user()->id)->get();  
    
        return view('Customer.Page.CustomerCart');
    }

    public function destroy($id){
        
        $carts = CartModel::findorfail($id);
        CartPriceModel::findorfail($carts->cartprice_id)->delete();
        $carts->forcedelete();
        return back()->with('successdel',"Item Deleted !");

    }

    public function quotation($id){

        $products = ProductsModel::findorFail($id);  
        $category = CategoryModel::findorFail($products->category_id);

        $pricingK = PricingModel::with(['Products', 'Size', 'PricingType'])
        ->where('product_id', $products->id)
        ->where('status', "Active")
        ->get();

        $paperspecsz = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes']) ->where('category_id', $products->category_id) ->get();

        try{
            $papertypes = PaperTypeModel:: where('id', $paperspecsz[0]->papertypes_id)->get();

            $quantities = QuantityModel::with(['CategoryType', 'PricingType'])
            ->Where('pricingtype_id', $pricingK[0]->pricingtype_id)
            ->where('categorytype_id', $category->categorytype_id)
            ->where('status', "Active")  
            ->get();

            $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $products->category_id)
            ->where('papertypes_id', $papertypes[0]->id)
            ->where('status', "Active")  
            ->get();
       
            $paperspecsx = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $products->category_id)
            ->whereNot('papertypes_id', $papertypes[0]->id)
            ->where('status', "Active")  
            ->get();

        }catch(Exception $e){

            $papertypes = PaperTypeModel:: where('id', count($paperspecsz))->get();
           
            $quantities = QuantityModel::with(['CategoryType', 'PricingType'])
            ->Where('pricingtype_id', count($pricingK))
            ->where('categorytype_id', $category->categorytype_id)
            ->where('status', "Active")  
            ->get();

            $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $products->category_id)
            ->where('papertypes_id',count($papertypes))
            ->where('status', "Active")  
            ->get();
    
            $paperspecsx = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $products->category_id)
            ->whereNot('papertypes_id', count($papertypes))
            ->where('status', "Active")  
            ->get();

        }
    
        $leafs = LeafModel::with('Category')
        ->where('category_id', $category->id)  
        ->where('status', "Active")   
        ->get();

        

        $productsg1 = ProductsModel::orderBy('name')->with('Category')
        ->where('status', "Active")
        ->get();

        $models = DimentionalModel::with('Category')
        ->where('category_id', $category->id)
        ->where('status', "Active")
        ->get();
       

        return view('Customer.Page.CustomerSpecs',     
        ['products' => $products,    
         'pricing' => $pricingK,
         'paperspecsx' => $paperspecsx,
         'paperspecs' => $paperspecs,
         'quantities' => $quantities,
         'leafs' => $leafs,
         'productsg1'=>$productsg1,
         'models'=>$models,
        ]);
    }   

    // public function test(Request $r){
    //     $this->validate($r,[    
    //         'Size' => 'required',
    //         'quantity' => 'required',
    //         'Paper2' => 'required',
    //     ]);

    //     $pricinga = PricingModel::with(['Products', 'Size', 'PricingType']) ->where('id', $r->Size) ->get();
    //     $quantity = QuantityModel::with(['CategoryType', 'PricingType']) ->where('id', $r->quantity) ->get();
    //     $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])->where('id', $r->Paper2)->get();
    //     $paperspec2 = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes']) ->where('id', $r->Paper1) ->get();  
    //     $leafs = LeafModel::with('Category')->where('id', $r->leaf) ->get();

    //     try{
    //         $counter = ( $quantity[0]->value * $pricinga[0]->price);
    //         $counter2 = ( $quantity[0]->value * $paperspecs[0]->value);
    //         $counter1 = ( $quantity[0]->value * $paperspec2[0]->value);
    //         $counter4 = ( $quantity[0]->value * $leafs[0]->value);

    //         $counter3 =  ( $counter2 + $counter +  $counter1 +  $counter4 );

    //     }catch(Exception $e){

    //         $counter = ($pricinga[0]->price * $quantity[0]->value);
    //         $counter2 = ( $quantity[0]->value * $paperspecs[0]->value);
    //         $counter3 =  ( $counter2 + $counter );
    //     }
        
      // foreach($cart as $carts){     
        //     if($carts->SpecsCover_id){
        //         echo($carts->SpecsCover->Papers->name);
        //     }
        //     else{
        //         echo($carts->Specs->Papers->name);
        //     }
        // }

    //     return view('Customer.Page.test', ['counter'=>$counter3,]);
    // }

        // $quantities = QuantityModel::with(['CategoryType', 'PricingType'])
        // ->Where('pricingtype_id', $cart[0]->ProductPricing->PricingType->id)
        // ->where('categorytype_id', $cart[0]->ProductPricing->Products->Category->CategoryType->id)
        // ->where('quantity', $cart[0]->quantity)
        // ->where('status', "Active")  
        // ->get();


}
