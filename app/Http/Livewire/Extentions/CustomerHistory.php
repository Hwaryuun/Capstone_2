<?php

namespace App\Http\Livewire\Extentions;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\OrdersModel;
use App\Models\OrderedItemsModel;
class CustomerHistory extends Component
{
    public $sumeru;
    use WithPagination;
    public function render()
    {

    
        $this->sumeru = OrdersModel::leftJoin('ordered_items', 'ordered_items.order_id', '=', 'orders.id')  
                        ->leftJoin('products', 'products.id', '=', 'ordered_items.product_id')
                        ->selectRaw('orders.*, products.name as nemu, ordered_items.quantity as qtt')         
                        ->where('orders.customer_id', auth('customer')->user()->id)
                        ->orderBy('created_at',  'desc')
                        ->get();

        $urdir = OrdersModel::leftJoin('ordered_items', 'ordered_items.order_id', '=', 'orders.id')  
        ->leftJoin('products', 'products.id', '=', 'ordered_items.product_id')
        // ->leftJoin('partialorder', 'partialorder.order_id', '=', 'orders.id') 
        ->selectRaw('orders.*, products.name as nemu, ordered_items.quantity as qtt')         
        ->where('orders.customer_id', auth('customer')->user()->id)
        ->orderBy('created_at',  'desc')
        ->paginate(6);


        $urdirs = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
        ->select('ordered_items.*')            
        ->where('orders.customer_id', auth('customer')->user()->id)
        ->get();
    
        
        return view('livewire.extentions.customer-history', ['urdir' => $urdir, 'urdirs' => $urdirs]);
    }
}
    
        
        // $urdirs = OrdersModel::leftJoin('ordered_items', 'ordered_items.order_id', '=', 'orders.id')  
        // ->leftJoin('partialorder', 'partialorder.order_id', '=', 'orders.id') 
        // ->leftJoin('usercart', 'usercart.id', '=', 'partialorder.cart_id')  
        // ->leftJoin('productpricing', 'productpricing.id', '=', 'usercart.pricing_id')  
        // ->leftJoin('products', 'products.id', '=', 'ordered_items.product_id', 'OR' ,'products.id', '=', 'productpricing.product_id')
        // ->selectRaw('orders.*, products.name as nemu, ordered_items.quantity as qtt, products.name as nemu,  products.image as image')         
        // ->where('orders.customer_id', auth('customer')->user()->id)
     
        // ->orderBy('created_at',  'desc')
        // ->get();

        // $OrderedItemsModel = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')
        // ->leftJoin('partialorder', 'partialorder.order_id', '=', 'orders.id')  
        // ->leftJoin('usercart', 'usercart.id', '=', 'partialorder.cart_id')  
        // ->leftJoin('productpricing', 'productpricing.id', '=', 'usercart.pricing_id')  
        // ->leftJoin('products', 'products.id', '=', 'productpricing.product_id')  
        // ->selectRaw('ordered_items.*, products.name as pname, products.image as pimage,  products.eproduction as pprod')            
        // ->where('orders.customer_id', auth('customer')->user()->id)
        // ->get();    // $urdir = OrdersModel::with(['ClientAcc'])
        // ->where('customer_id', auth('customer')->user()->id)
        // ->orderBy('created_at',  'desc')
        // ->get();  

        
        // $saki = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')
        // ->leftJoin('partialorder', 'partialorder.order_id', '=', 'orders.id')  
        // ->leftJoin('usercart', 'usercart.id', '=', 'partialorder.cart_id')  
        // ->leftJoin('productpricing', 'productpricing.id', '=', 'usercart.pricing_id')  
        // ->leftJoin('products', 'products.id', '=', 'productpricing.product_id','OR', 'products.id', '=', 'ordered_items.product_id')  
        // ->selectRaw('ordered_items.*, products.name as pname, products.image as pimage,  products.eproduction as pprod')            
        // ->where('orders.customer_id', auth('customer')->user()->id)
        // ->get();
