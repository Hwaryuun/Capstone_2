<?php

namespace App\Http\Livewire\Extentions;
use App\Models\PartialModel;
use Livewire\Component;
use Livewire\WithPagination;

class MyOrders extends Component
{
    use WithPagination;
    public $csx;

    public function CSX($id){ 
        $this->csx = $id;        
    }
  
    public function CSXG(){ 
        $this->csx = 0;        
    }

    public function Partials($id){ 
             
        $yomi = PartialModel::findorFail($id);
        if( $yomi->status == "partial1"){    
            $yomi ->update(array('status' => "partial0"));    
        }else{
            $yomi ->update(array('status' => "partial1"));
        }
        
    }
  
    public function render()
    {
    
        $partials = PartialModel::with(['ClientAcc','Orders'])->where('customer_id', auth('customer')->user()->id)->paginate(6); 
          
        $partial = PartialModel::with(['ClientAcc','Orders'])
        ->where('customer_id', auth('customer')->user()->id)
        ->where('status', "partial1")
        ->get();  
        
        $sumeru = PartialModel::with(['ClientAcc','Orders'])->where('customer_id', auth('customer')->user()->id)->get(); 

        return view('livewire.extentions.my-orders', ['partial' => $partial, 'partials' =>  $partials, 'sumeru' =>  $sumeru]);
    }
}
