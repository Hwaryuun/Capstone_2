<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartPriceModel extends Model
{
    use HasFactory; 
    protected $table = 'cartprice';
    protected $fillable = ['sizeprice','defaultprice', 'coverprice', 'leafprice', 'quantity'];

}
