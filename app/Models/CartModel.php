<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'usercart';
    protected $fillable = [ 'customer_id','cartprice_id', 'pricing_id', 'paperdefault', 'quantity', 'cover', 'page', 'files', 'price','status'];


    public function ClientAcc()
    {
      return $this->belongsTo(CustomerModel::class, 'customer_id', 'id')->withTrashed();
    }  

    public function ProductPricing()
    {
      return $this->belongsTo(PricingModel::class, 'pricing_id', 'id')->withTrashed();
    }  

    public function CartPrice()
    {
      return $this->belongsTo(CartPriceModel::class, 'cartprice_id', 'id');
    }  


    // public function Specs()
    // {
    //   return $this->belongsTo(PaperSpecsModel::class, 'specs_id', 'id');
    // }  

    // public function SpecsCover()
    // {
    //   return $this->belongsTo(PaperSpecsModel::class, 'SpecsCover_id', 'id');
    // }  

    // public function Quantity()
    // {
    //   return $this->belongsTo(QuantityModel::class, 'quantity_id', 'id');
    // }  
    // public function Leaf()
    // {
    //   return $this->belongsTo(LeafModel::class, 'leaf_id', 'id');
    // }  
}
