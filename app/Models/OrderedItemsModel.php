<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderedItemsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'ordered_items';
    protected $fillable = ['order_id','orderitemprice_id', 'product_id','size', 'paperdefault', 'quantity', 'cover', 'page', 'files', 'status', 'price', 'tracking_old'];

    public function Orders()
    {
      return $this->belongsTo(OrdersModel::class, 'order_id', 'id')->withTrashed();
    }  

    public function Products()
    {
      return $this->belongsTo(ProductsModel::class, 'product_id', 'id')->withTrashed();
    }  

    public function OrderItemPrice()
    {
      return $this->belongsTo(OrderItemPriceModel::class, 'orderitemprice_id', 'id');
    }  

}
