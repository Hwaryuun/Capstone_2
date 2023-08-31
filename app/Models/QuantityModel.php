<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuantityModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'quantity';
    protected $fillable = ['quantity', 'value', 'categorytype_id', 'pricingtype_id', 'status'];

    public function CategoryType()
    {
      return $this->belongsTo(CategoryTypeModel::class, 'categorytype_id', 'id')->withTrashed();
    }    
    
    public function PricingType()
    {
      return $this->belongsTo(PricingTypeModel::class, 'pricingtype_id', 'id')->withTrashed();
    }                                                   //fk                //owner key
//fk                //owner key


}
