<?php

namespace App\Http\Livewire\Extentions;

use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MyOrders2 extends Component
{
    use WithPagination;
  
    public $sixto = [], $chx;
    public $status = 0;

    public function CSX($id){ 
        $this->chx = $id;        
    }
  
    public function CSXG(){ 
        $this->chx = 0;        
    }

    public function render()
    {

        if($this->status == 3){
            $saki = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
            ->select('ordered_items.*')            
            ->where('orders.customer_id', auth('customer')->user()->id)
            ->Where('ordered_items.status', 'Finished' )
            ->paginate(6);

        }elseif($this->status == 2){

            $saki = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
            ->select('ordered_items.*')            
            ->where('orders.customer_id', auth('customer')->user()->id)
            ->Where('ordered_items.status', 'In-Progress' )
            ->paginate(6);

        }
        elseif($this->status == 1){

            $saki = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
            ->select('ordered_items.*')            
            ->where('orders.customer_id', auth('customer')->user()->id)
            ->Where('ordered_items.status', 'New-Order' )
            ->paginate(6);      
        }
            
        else{
            $saki = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
            ->select('ordered_items.*')            
            ->where('orders.customer_id', auth('customer')->user()->id)
            ->paginate(6);
            
        }
       
          
   

        $sumeru = OrderedItemsModel::leftJoin('orders', 'orders.id', '=', 'ordered_items.order_id')  
                                    ->select('ordered_items.*')            
                                    ->where('orders.customer_id', auth('customer')->user()->id)
                                    ->get();

   
    
       
        return view('livewire.extentions.my-orders2', [ 'partialtsz' => $saki, 'sumeru' => $sumeru]);
    }
}
        // $partialts = OrdersModel::where('customer_id', auth('customer')->user()->id)->get();     
        // foreach($partialts as $ax){
        //     $partials = OrderedItemsModel::with(['Orders','Products'])->where('order_id',  $ax ->id)->get(); 

        //     foreach($partials as $axs){
        //         $this->sixto [] = $axs;
        //     }
        // }
     // $saki = DB::select(DB::raw("SELECT * FROM `ordered_items` 
        //                             LEFT JOIN orders ON orders.id = ordered_items.order_id
        //                             WHERE orders.customer_id = 1
        //                             GROUP BY ordered_items.id"));

        