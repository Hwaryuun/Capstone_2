<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DimentionalModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'dimentionalmodels';
    protected $fillable = [ 'name', 'category_id', 'model', 'status' ];

    public function Category()
    {
      return $this->belongsTo(CategoryModel::class, 'category_id', 'id')->withTrashed();
    }  
}
