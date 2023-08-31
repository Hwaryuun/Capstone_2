<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'productpricing';
    protected $fillable = ['product_id', 'size_id', 'pricingtype_id', 'price', 'status'];

    
    public function Products()
    {
      return $this->belongsTo(ProductsModel::class, 'product_id', 'id')->withTrashed();
    }  
    public function Size()
    {
      return $this->belongsTo(SizeModel::class, 'size_id', 'id')->withTrashed();
    }  
    public function PricingType()
    {
      return $this->belongsTo(PricingTypeModel::class, 'pricingtype_id', 'id')->withTrashed();
    }  
}
