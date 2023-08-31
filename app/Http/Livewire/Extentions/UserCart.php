<?php

namespace App\Http\Livewire\Extentions;
use App\Models\CartModel;
use Illuminate\Http\Request;
use Livewire\Component;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class UserCart extends Component
{
    use WithPagination;
    
    public function Usrcart($id){ 
             
        $yomi = CartModel::findorFail($id);
        if( $yomi->status == "cart1"){    
            $yomi ->update(array('status' => "cart0"));    
        }else{
            $yomi ->update(array('status' => "cart1"));
        }
  
    }
  
    public function render()
    {         
        $cart = CartModel::with(['ClientAcc','ProductPricing'])->where('customer_id', auth('customer')->user()->id)->paginate(6); 
          
        $carstats = CartModel::with(['ClientAcc','ProductPricing'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "cart1")
        ->get();  

        return view('livewire.extentions.user-cart', ['cart'=>$cart, 'carstats'=>$carstats  ]);
    }

}


// public $usrcart = [];
// public $arr = [];
// public $arrSum;

     // $this->arr = CartModel::findorFail($this->usrcart);
        // $this->arrSum =CartModel::findorFail($this->usrcart)->Sum('price');
        // $carts = CartModel::with(['ClientAcc','ProductPricing'])->where('id', $this->usrcart)->get(); 

        // dd($carts[0]->price);
            //  foreach( $this->usrcart as $as){
            //     $sayah = CartModel::with(['ClientAcc','ProductPricing'])->where('id', $this->usrcart)->get(); 
       
            //     foreach($sayah as $rt){
            //         $this->result =$rt ;
                 
            //     }
            // }
         // foreach($this->usrcart as $as){
        //     $this->arr  = [ $as ];     
        // } 
        // for($i = 0; $i <= count($this->usrcart); $i++){
         
        // }

        // $this->arr = array(
        //     $as = CartModel::where('id',  $as)->get()
        //  );  DB::table('usercart')->where('id',$as)->get()
        // $this->dsrcart [] = $this->arr;
        // return $this->dsrcart ;

    