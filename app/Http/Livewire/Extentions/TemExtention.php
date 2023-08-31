<?php

namespace App\Http\Livewire\Extentions;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use App\Models\PricingTypeModel;
use App\Models\PricingModel;
use App\Models\SizeModel;
use App\Models\PaperSpecsModel;
use App\Models\PaperTypeModel;
use App\Models\QuantityModel;
use App\Models\LeafModel;
use App\Models\DimentionalModel;
use Exception;

use Livewire\Component;

class TemExtention extends Component
{
    public $result = 0;
    public $sizeprice = 0, $paperprice = 0, $paperprice2 = 0,  $quantitty,  $pages = 0;
    public $productiontime, $productname;
    public $SizeInput,$PaperInput,$PaperInput2,$QuantityInput,$LeafInput;
    public $product_id,$category_id,$papertypes,$service_id, $tempo;
   // $SizeInput = 0 or ""
    
    public function mount($product, $templates){
        if($product){
            
            $this->tempo = $templates;
            $this->product_id = $product->id;
            $this->productiontime = $product->eproduction;
            $this->productname = $product->name;
            $this->category_id = $product->category_id;       
            $this->service_id= $product->Category->categorytype_id;

            $paperspecsz = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes']) ->where('category_id', $this->category_id) ->get();
              
            try {
                $this->papertypes = PaperTypeModel:: where('id', $paperspecsz[0]->papertypes_id)->get();
            } catch (Exception $th) {
                $this->papertypes = PaperTypeModel:: where('id', 0)->get();
            }
        }
    }

    public function render()
    {
        $sizes = PricingModel::with(['Products', 'Size', 'PricingType']) ->where('product_id', $this->product_id)
        ->where('status', "Active")
        ->get();
   
        try{
            $quantities = QuantityModel::with(['CategoryType', 'PricingType'])
            ->Where('pricingtype_id', $sizes[0]->pricingtype_id)
            ->where('categorytype_id', $this->service_id)
            ->where('status', "Active")  
            ->get();
        }catch(Exception){
            $quantities = QuantityModel::with(['CategoryType', 'PricingType'])
            ->Where('pricingtype_id', 0)
            ->get();    
        }

        try{
            $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $this->category_id)
            ->where('papertypes_id', $this->papertypes[0]->id)
            ->where('status', "Active")  
            ->get();
        }catch(Exception){
            $paperspecs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('papertypes_id', 0)
            ->get();
        }

        try{
            $paperspecs2 = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->where('category_id', $this->category_id)
            ->whereNot('papertypes_id', $this->papertypes[0]->id)
            ->where('status', "Active")  
            ->get();

        }catch(Exception){
            $paperspecs2 = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])
            ->whereNot('papertypes_id', 0)
            ->get();
        }
        //FINDING SIZE DEBUG LATUR
   
        $leafs = LeafModel::with('Category')->where('category_id', $this->category_id)->where('status', "Active")->get();
        
        $pricinga = PricingModel::with(['Products', 'Size', 'PricingType']) ->where('id', $this->SizeInput)->get();
        $quantity = QuantityModel::with(['CategoryType', 'PricingType']) ->where('id', $this->QuantityInput) ->get();
        $cac = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])->where('id', $this->PaperInput)->get();
        $cacs = PaperSpecsModel::with(['Category', 'Papers', 'PaperTypes'])->where('id', $this->PaperInput2)->get();
        $page = LeafModel::with('Category')->where('id', $this->LeafInput)->get();

        if($this->SizeInput != null){
          $this->sizeprice = $pricinga[0]->price;
        }else{
            $this->sizeprice = " ";
        }

        if($this->PaperInput != null){
            $this->paperprice = $cac[0]->value;
        }else{
              $this->paperprice = " ";
        }

        if($this->PaperInput2 != null){
            $this->paperprice2 = $cacs[0]->value;
        }else{
              $this->paperprice2 = " ";
        }

        if($this->QuantityInput != null){
            $this->quantitty = $quantity[0]->quantity;
        }else{
              $this->quantitty = "---";
        }
      
        if($this->LeafInput != null){
            $this->pages = $page[0]->value;
        }else{
              $this->pages = " ";
        }
        
      //computation live
        if($this->SizeInput != null && $this->PaperInput != null && $this->PaperInput2 != null && $this->QuantityInput != null && $this->LeafInput != null){
            $counter = ($pricinga[0]->price * $quantity[0]->value);
            $counter2 = ( $quantity[0]->value * $cac[0]->value);
            $counter3 = ( $quantity[0]->value * $cacs[0]->value);
            $counter4 = ( $quantity[0]->value * $page[0]->value);
            $this->result =  ( $counter4 + $counter3 + $counter2 + $counter );
        }
        elseif($this->SizeInput != null && $this->PaperInput != null && $this->QuantityInput != null){
            $counter = ($pricinga[0]->price * $quantity[0]->value);
            $counter2 = ( $quantity[0]->value * $cac[0]->value);
            $this->result =  ( $counter2 + $counter );
        }
        else{
            $this->result = 0;
        }

        return view('livewire.extentions.tem-extention',[
            'sizes' => $sizes,
            'quantities' => $quantities,
            'paperspecs' => $paperspecs,
            'paperspecs2' => $paperspecs2,
            'leafs' => $leafs,
        ]);
    }
}
