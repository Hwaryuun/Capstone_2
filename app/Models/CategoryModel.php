<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'category';
    protected $fillable = [ 'name', 'description', 'categorytype_id', 'status', 'image'];


    public function CategoryType()
    {
      return $this->belongsTo(CategoryTypeModel::class, 'categorytype_id', 'id')->withTrashed();
    }  
    
    // public function CProducts(){
    //           return $this->hasMany(Category::class);
    // }

    
}

