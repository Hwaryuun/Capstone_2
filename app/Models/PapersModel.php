<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PapersModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'papers';
    protected $fillable = [ 'name', 'status'];

}
