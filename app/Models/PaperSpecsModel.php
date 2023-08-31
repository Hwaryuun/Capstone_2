<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaperSpecsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'paperspecs';
    protected $fillable = [  'category_id', 'papers_id', 'papertypes_id', 'lbs', 'value', 'quantity', 'status'];

    
    public function Category()
    {
      return $this->belongsTo(CategoryModel::class, 'category_id', 'id')->withTrashed();
    }  
    public function Papers()
    {
      return $this->belongsTo(PapersModel::class, 'papers_id', 'id')->withTrashed();
    }  
    public function PaperTypes()
    {
      return $this->belongsTo(PaperTypeModel::class, 'papertypes_id', 'id')->withTrashed();
    }  
  
}
