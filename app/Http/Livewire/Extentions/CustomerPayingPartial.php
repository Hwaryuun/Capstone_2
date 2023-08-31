<?php

namespace App\Http\Livewire\Extentions;
use App\Models\CartModel;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use App\Models\PartialModel;
use App\Models\OrderItemPriceModel;
use App\Models\CartPriceModel;
use Illuminate\Support\Str;
use Exception;
use Livewire\Component;

class CustomerPayingPartial extends Component
{
    public $firstname, $lastname, $phone, $emailadd, $condition, $ref = NULL,  $remarks, $pay_id = NULL,  $pay_ty = NULL;
    public $carstats, $carstatsz, $sixtos;

    
    protected $listeners = [
        'validationForAll',
        'trasactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value){

        $this->pay_ty = 'Paypal';
        $this->pay_id = $value;
     
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
            'condition' =>  'accepted' ];
    }

    public function placeOrder(){

        $this->validate();
        $this->ref = 'DSPLUS-'.Str::random(10);

        $order = OrdersModel::create([
            'customer_id' => auth('customer')->user()->id, 
            'tracking_no' =>  $this->ref, 
            'fullname' => $this->firstname." ". $this->lastname, 
            'phone' => $this->phone, 
            'emailadd' => $this->emailadd, 
            'remarks' => $this->remarks, 
            'status' => 'New-Order', 
            'paid' => $this->carstats->sum('price'), 
            'paymentmode' => 'Fully-Paid', 
            'paymenttype' =>  $this->pay_ty, 
            'payment_id' => $this->pay_id
        ]);
 
        foreach($this->carstats as $poItem){     

            $sei = OrderItemPriceModel::create([
                'sizeprice' =>  $poItem->Carts->CartPrice->sizeprice, 
                'defaultprice'=> $poItem->Carts->CartPrice->defaultprice,
                'coverprice' => $poItem->Carts->CartPrice->coverprice, 
                'leafprice' => $poItem->Carts->CartPrice->leafprice, 
                'quantity' => $poItem->Carts->CartPrice->quantity, 
            ]); 
           
            
            $orderITMS = OrderedItemsModel::create([
                'order_id' =>  $order->id, 
                'product_id' =>  $poItem->Carts->ProductPricing->product_id, 
                'orderitemprice_id'=> $sei->id,
                'size' => $poItem->Carts->ProductPricing->Size->length." x ".$poItem->Carts->ProductPricing->Size->width, 
                'paperdefault' => $poItem->Carts->paperdefault, 
                'quantity' =>  $poItem->Carts->quantity, 
                'cover'  =>  $poItem->Carts->cover , 
                'page'  =>  $poItem->Carts->page, 
                'files' =>  $poItem->Carts->files, 
                'status' => $poItem->statusODR, 
                'price' => $poItem->price + $poItem->price,
                'tracking_old' => $poItem->Orders->tracking_no,
            ]);
                    PartialModel::where('id', $poItem->id)->where('status', "partial1")->delete();
                    CartPriceModel::findorfail($poItem->Carts->cartprice_id)->delete();
                    CartModel::where('id', $poItem->cart_id)->where('status', "cart1")->onlyTrashed()->forcedelete();
                    
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
            dd('errs');
        }
    }
    public function render()
    {
        $this->carstats = PartialModel::with(['ClientAcc','Orders'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "partial1")
        ->get(); 

        $this->carstatsz = OrderedItemsModel::with(['Orders'])->get(); 

        return view('livewire.extentions.customer-paying-partial');
    }
}
