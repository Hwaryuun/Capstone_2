<?php

namespace App\Http\Livewire\Extentions;
use App\Models\CartModel;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use App\Models\OrderItemPriceModel;
use App\Models\CartPriceModel;
use Illuminate\Support\Str;
use App\Models\PaperSpecsModel;
use Livewire\Component;

class CustomerPO extends Component
{
    public $firstname, $lastname, $phone, $emailadd,  $remarks, $policy,  $ref = NULL, $condition, $pay_id = NULL,  $pay_ty = NULL;
    public $carstats;

    protected $listeners = [
        'validationForAll',
        'trasactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value){

        $this->pay_id = $value;
        $this->pay_ty = 'Paypal';
        $this->validate();

        if(count($this->carstats) != 0){
            $onEntr = $this->placeOrder();
            if($onEntr){    
                
                $this->firstname= "";
                $this->lastname= "";
                $this->phone= "";
                $this->emailadd = "";
                $this->remarks = ""; 
    
            }else{
                  
            }
        }
        else{

        }

    }

    public function validationForAll(){
        $this->validate();
    }
    public function rules(){

        return
            [ 'firstname' => 'required|string|max:121',
              'lastname' => 'required|string|max:121',
              'phone' => 'required',
              'emailadd' => 'required|email|max:121',
              'condition' =>  'accepted'
              ];
    }

    public function placeOrder(){
        $this->validate();
        $this->ref = 'DSPLUS-'.Str::random(10);
        $order = OrdersModel::create([
            'customer_id' => auth('customer')->user()->id, 
            'tracking_no' => $this->ref, 
            'fullname' => $this->firstname." ". $this->lastname, 
            'phone' => $this->phone, 
            'emailadd' => $this->emailadd, 
            'remarks' => $this->remarks, 
            'status' => 'New-Order', 
            'paid' => $this->carstats->sum('price'), 
            'paymentmode' => 'Full-Payment', 
            'paymenttype' =>  $this->pay_ty, 
            'payment_id' => $this->pay_id,
           
        ]);

        foreach($this->carstats as $poItem){

        $sei = OrderItemPriceModel::create([
            'sizeprice' =>  $poItem->CartPrice->sizeprice, 
            'defaultprice'=> $poItem->CartPrice->defaultprice,
            'coverprice' => $poItem->CartPrice->coverprice, 
            'leafprice' => $poItem->CartPrice->leafprice, 
            'quantity' => $poItem->CartPrice->quantity, 
        ]); 
       
        $orderITMS = OrderedItemsModel::create([
            'order_id' =>  $order->id, 
            'product_id'=> $poItem->ProductPricing->product_id,
            'orderitemprice_id'=> $sei->id,
            'size' => $poItem->ProductPricing->Size->length." x ".$poItem->ProductPricing->Size->width, 
            'paperdefault' => $poItem->paperdefault, 
            'quantity' => $poItem->quantity, 
            'cover'  => $poItem->cover, 
            'page'  => $poItem->page, 
            'files' => $poItem->files, 
            'status' => 'New-Order', 
            'price' => $poItem->price,
            'tracking_old' => 'NO-OLD ORDER TRACKING',
        ]);

            $cartss = CartModel::findorfail($poItem->id);
            CartPriceModel::findorfail($cartss->cartprice_id)->delete();
            $cartss->forcedelete();
            PaperSpecsModel::where('category_id', $poItem->ProductPricing->Products->id)->decrement('quantity', $poItem->quantity);
             
            //  CartModel::findorfail($poItem->id)->forcedelete();
       }
   
       return $order;
    }

    public function onEntr(){

        if(count($this->carstats) != 0){
            $onEntr = $this->placeOrder();
            if($onEntr){     
                    return back()->with('LogSuccess',  'Order Success');
            }else{
                    return back()->with('fail',  'Check Your Orders');
            }
        }
        else{

        }
    }
    public function render()
    {

        $this->carstats = CartModel::with(['ClientAcc','ProductPricing'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "cart1")
        ->get(); 

        return view('livewire.extentions.customer-p-o', ['carstats' => $this->carstats ]);
    }
}
