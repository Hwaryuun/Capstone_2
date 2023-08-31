<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [ 'name', 'description', 'category_id', 'image', 'eproduction', 'status'];

    
    public function Category()
    {
      return $this->belongsTo(CategoryModel::class, 'category_id', 'id')->withTrashed();
    }  

}
