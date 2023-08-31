<?php

namespace App\Http\Controllers\Customers\Payment;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use App\Models\PartialModel;

class PaymentController extends Controller
{
    public function index(){

        $urdirs = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
        ->select('ordered_items.*')            
        ->where('orders.customer_id', auth('customer')->user()->id)
        ->get();

        $sumeru = OrdersModel::leftJoin('ordered_items', 'ordered_items.order_id', '=', 'orders.id')  
                        ->leftJoin('products', 'products.id', '=', 'ordered_items.product_id')
                        ->selectRaw('orders.*, products.name as nemu, ordered_items.quantity as qtt')         
                        ->where('orders.customer_id', auth('customer')->user()->id)
                        ->orderBy('created_at',  'desc')
                        ->get();
    

        return view('Customer.Page.CustomerPOHistory', ['urdirs' => $urdirs, 'sumeru' =>  $sumeru]);
    }

    public function HistoDestroyer($id){

        $hourders = OrdersModel::findorfail($id)->delete();
        return back()->with('removed',  'History Removed');
    }


    public function destroy($id){

        $categorytype = OrderedItemsModel::findorfail($id)->delete();
        return back()->with('removed',  'Order Removed');
    }

    public function MyOrders(){
        return view('Customer.Page.CustomerOrders');
    }

    public function PlaceOrderPaidPartial(){

        $partial = PartialModel::with(['ClientAcc','Orders'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "partial1")
        ->get();  

        if(count($partial) != 0){
            return view('Customer.Page.CustomerPartial');
        }else{
            return back()->with('return', ' Select an Order !');
        }    

    }


    public function PlaceOrder(){

        $carstats = CartModel::with(['ClientAcc','ProductPricing'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "cart1")
        ->get();  

        if(count($carstats) != 0){
            return view('Customer.Page.CustomerPO', ['type' => 'full'] );
        }else{
            return back()->with('return', ' Place an Order !');
        }    
    }

    public function PlaceOrderPartial(){

        $carstats = CartModel::with(['ClientAcc','ProductPricing'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "cart1")
        ->get();  

        if(count($carstats) != 0){
            return view('Customer.Page.CustomerPO',  [ 'type' => 'partial'] );
        }else{
            return back()->with('return', ' Place an Order !');
        }    
    }
    
}
