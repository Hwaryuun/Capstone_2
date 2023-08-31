<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeafModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'leafquantity';
    protected $fillable = ['quantity', 'value', 'category_id', 'status'];

    public function Category()
    {
      return $this->belongsTo(CategoryModel::class, 'category_id', 'id')->withTrashed();
    }    
    
}
