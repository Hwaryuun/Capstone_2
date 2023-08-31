<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemPriceModel extends Model
{
    use HasFactory;
    protected $table = 'orderitemprice';
    protected $fillable = ['sizeprice','defaultprice', 'coverprice', 'leafprice', 'quantity'];

}
