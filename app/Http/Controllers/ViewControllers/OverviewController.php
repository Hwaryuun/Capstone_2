<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryTypeModel;
use App\Models\PartialModel;
use App\Models\OrdersModel;
use App\Models\OrderedItemsModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel;
use PHPUnit\Framework\Constraint\Count;

class OverviewController extends Controller
{

    public function index(){
     
             
        $categorytype = CategoryTypeModel::orderBy('typename')->get();
     
        $saki = DB::select(DB::raw(" SELECT products.name, SUM(ordered_items.price) as revenue, SUM(partialorder.price) as partialis, (SUM(partialorder.price) + SUM(ordered_items.price)) as combine  FROM `products` 
                                     LEFT JOIN ordered_items ON ordered_items.product_id = products.id
                                     LEFT JOIN productpricing ON productpricing.product_id = products.id
                                     LEFT JOIN usercart ON usercart.pricing_id = productpricing.id
                                     LEFT JOIN partialorder ON partialorder.cart_id = usercart.id
                                     GROUP BY products.name "));

        $daiki = OrderedItemsModel::leftJoin('products', 'ordered_items.product_id', '=', 'products.id')
                                   ->selectRaw('ordered_items.*, SUM(ordered_items.price) as sales')    
                                   ->groupByRaw('DAY(ordered_items.created_at)')
                                   ->get();
        
        // foreach($daiki as $sakii){
        //     dd($sakii);
        // }
      

        $daiki2 = PartialModel::leftJoin('usercart', 'partialorder.cart_id', '=', 'usercart.id')
                                ->leftJoin('productpricing', 'usercart.pricing_id', '=', 'productpricing.id')
                                ->leftJoin('products', 'productpricing.product_id', '=', 'products.id')
                                ->selectRaw('partialorder.*, partialorder.created_at as datecreated,  SUM(partialorder.price) as sales')    
                                ->groupByRaw('DAY(partialorder.created_at)')
                                ->get();

                
            
        $stats12 = OrderedItemsModel::withTrashed()->with('Orders')->where('status', 'New-Order')->count() + PartialModel::with(['Orders','ClientAcc','Carts'])->where('statusODR', 'New-Order')->count();
        $stats2 = OrderedItemsModel::withTrashed()->with('Orders')->where('status', 'In-Progress')->count() + PartialModel::with(['Orders','ClientAcc','Carts'])->where('statusODR', 'In-Progress')->count();
        $stats3 = OrderedItemsModel::withTrashed()->with('Orders')->where('status', 'Finished')->count() + PartialModel::with(['Orders','ClientAcc','Carts'])->where('statusODR', 'Finished')->count();

     
                                
        $customer = CustomerModel::get();
        $orders = OrderedItemsModel::withTrashed()->with('Orders')->whereNot('status', "Finished")->get();
        $orders2 = PartialModel::with(['Orders','ClientAcc','Carts'])->whereNot('statusODR', "Finished")->get(); 
        $coset = OrderedItemsModel::withTrashed()->with('Orders')->where('status', "Finished")->get();
        $coset2 = PartialModel::with(['Orders','ClientAcc','Carts'])->where('statusODR', "Finished")->get(); 
    
        return view('Admin.Preview.Overview', [
            'categorytype' => $categorytype, 
            'data' => $saki, 'orders' => $orders, 
            'orders2'=>$orders2, 'daiki' => $daiki,  'daiki2' => $daiki2, 'customer' =>  $customer
            ,'stats12'=>$stats12,'stats2'=>$stats2,'stats3'=>$stats3, 
            'coset'=>$coset,'coset2'=>$coset2, 
        ]);
   }
}

    //  $daiki3 = CategoryTypeModel::leftJoin('category', 'category.categorytype_id', '=', 'categorytype.id')
    //                                 ->leftJoin('products', 'products.category_id', '=', 'category.id')
    //                                 ->leftJoin('productpricing', 'productpricing.product_id', '=', 'products.id')
    //                                 ->leftJoin('usercart', 'usercart.pricing_id', '=', 'productpricing.id')
    //                                 ->leftJoin('partialorder', 'partialorder.cart_id', '=', 'usercart.id')
    //                                 ->leftJoin('ordered_items', 'ordered_items.product_id', '=', 'products.id')
    //                                 ->selectRaw('categorytype.*,  SUM(ordered_items.price + partialorder.price) as sales ,  categorytype.typename as nme')    
    //                                 ->groupBy('categorytype.typename')
    //                                 // ->groupByRaw('WEEK(ordered_items.created_at)')
    //                                 ->get();     

// SELECT categorytype.typename, SUM(ordered_items.price)  as sales , ordered_items.created_at as datee FROM `categorytype` 
// LEFT JOIN category ON category.categorytype_id = categorytype.id
// LEFT JOIN products ON products.category_id = category.id
// LEFT JOIN ordered_items ON ordered_items.product_id = products.id
// GROUP BY DAY(ordered_items.created_at)


        
            // $orders = array();

            // foreach($sumeru as $summer){

            //     $orders[] = [
            //         'Product' => $summer->product_id,
            //         'Finished' => $summer->created_at
    
            //     ];

            // }
           
        
        // $data []=  "";

        // foreach($saki as $val){
        //     $data ="['".$val->name."',".$val->revenue."],";  
        // }
     
        // foreach( $categorytype as $as){
        //     $cat = CategoryModel::orderBy('  name')->where('categorytype_id', $as->id)->count();
     
         
        //     echo( $cat);, 'cat' => $cat, compact('data')
        // }

        
