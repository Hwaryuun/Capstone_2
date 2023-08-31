<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'featured';
    protected $fillable = [  'name', 'product_id', 'design_id', 'date', 'status'];

    
    public function Products()
    {
      return $this->belongsTo(ProductsModel::class, 'product_id', 'id')->withTrashed();
    }  
    public function Design()
    {
      return $this->belongsTo(DesignModel::class, 'design_id', 'id')->withTrashed();
    }  
}
