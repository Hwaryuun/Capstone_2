<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartialModel extends Model
{
    use HasFactory;
    protected $table = 'partialorder';
    protected $fillable = ['customer_id','order_id', 'cart_id', 'status', 'statusODR', 'price'];

    public function Orders()
    {
      return $this->belongsTo(OrdersModel::class, 'order_id', 'id')->withTrashed();
    }  
    public function ClientAcc()
    {
      return $this->belongsTo(CustomerModel::class, 'customer_id', 'id')->withTrashed();
    }  
    public function Carts()
    {
      return $this->belongsTo(CartModel::class, 'cart_id', 'id')->withTrashed();
    }  

}
