<?php

namespace App\Http\Livewire\ExtentionsAdmin;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Livewire\Component;

class OrdersF extends Component
{
    public $stats;
   
    public function Order($numeru){
         
        if($numeru == 0){
            $this->stats = 0;
        }elseif($numeru  == 2){
            $this->stats = 2;
        }elseif($numeru  == 1){
            $this->stats = 1;
        }
        
    
    }
    
 
    public function render()
    {
        if( $this->stats == 0){
            $sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
            ->where('status', 'New-Order') ->get();        
         
        }elseif($this->stats == 2){
            $sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
            ->where('status', 'In-Progress') ->get(); 
    

        }elseif($this->stats == 1){
            $sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
            ->where('status', 'Finished') ->get(); 
            
        }


        return view('livewire.extentions-admin.orders-f', ['sumeru' => $sumeru]);
    }
}
