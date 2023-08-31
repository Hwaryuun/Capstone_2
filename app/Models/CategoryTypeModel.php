<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTypeModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'categorytype';
    protected $fillable = [ 'typename', 'status' ];

//    public function Category(){
//         return $this->hasMany(Category::class,'categorytype_id', 'id');
//    }
    
}
