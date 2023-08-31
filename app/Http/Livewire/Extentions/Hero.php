<?php

namespace App\Http\Livewire\Extentions;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Livewire\Component;
use Livewire\WithPagination;

class Hero extends Component
{
    use WithPagination;
    public $orderby = 0;

    public function Orderby($id)
    {
        $this->orderby = $id;
    
    }
    public function OrderAll()
    {
        $this->orderby = 0;
    
    }



    public function render()
    {
      
        $category = CategoryModel::orderBy('created_at')->with('CategoryType')->paginate(7);

        if($this->orderby != 0){
            $products = ProductsModel::where('category_id',$this->orderby)->paginate(12);

        }else{
            $products = ProductsModel::orderBy('name')->with('Category')->paginate(12);
            
        }
       

        return view('livewire.extentions.hero',[
            'category' => $category, 'products' => $products,
        ]);
    }
}
