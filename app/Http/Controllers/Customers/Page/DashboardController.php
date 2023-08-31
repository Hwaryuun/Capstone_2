<?php

namespace App\Http\Controllers\Customers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignModel;
use App\Models\FeaturedModel;
use App\Models\ProductsModel;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use App\Models\PartialModel;

class DashboardController extends Controller
{
    public function DsInfo(){
        return view('DsInfo');
    }
    public function index(){

        $featured = FeaturedModel::orderBy('name')->with(['Products', 'Design'])->where('status', "Active")->get();


        $sumeru = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
        ->select('ordered_items.*')            
        ->where('orders.customer_id', auth('customer')->user()->id)
        // ->whereNot('ordered_items.status', 'Finished')
        ->get();

        $partial = PartialModel::with(['ClientAcc','Orders'])
        ->where('customer_id', auth('customer')->user()->id)
        // ->whereNot('statusODR', "Finished")
        ->get();
        
        // $partials = PartialModel::with(['ClientAcc','Orders'])
        // ->where('customer_id', auth('customer')->user()->id)
        // ->where('statusODR', "Finished")
        // ->get();

        // $sumerus = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
        // ->select('ordered_items.*')            
        // ->where('orders.customer_id', auth('customer')->user()->id)
        // ->where('ordered_items.status', 'Finished')
        // ->get();



        return view('Customer.Page.Dashboard', [         
            'featured' => $featured, 'sumeru' => $sumeru, 'partial'=>$partial,
            // 'sumerus' => $sumerus, 'partials'=>$partials
        ]);
  
    }
}
