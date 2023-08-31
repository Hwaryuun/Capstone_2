<?php

namespace App\Http\Livewire\Extentions;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
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

        $categorytype = CategoryTypeModel::where('status', 'Active')->get();

        if($this->orderby != 0){
            $category = CategoryModel::orderBy('name')->with('CategoryType')
            ->where('status', "Active") ->where('categorytype_id', $this->orderby)
            ->paginate(6);
            
        }else{
            $category = CategoryModel::orderBy('name')->with('CategoryType')->where('status', "Active")->paginate(6);
            // $products = ProductsModel::orderBy('name')->with('Category')->paginate(9);
            
        }
       

       
        return view('livewire.extentions.category', ['category' =>  $category, 'categorytype'=>$categorytype]);
    }
}
