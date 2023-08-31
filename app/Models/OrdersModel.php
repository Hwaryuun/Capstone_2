<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'tracking_no', 'fullname', 'phone', 'emailadd', 'remarks', 'status', 'paid', 'paymentmode', 'paymenttype','payment_id'];

    public function ClientAcc()
    {
      return $this->belongsTo(CustomerModel::class, 'customer_id', 'id')->withTrashed();
    }  

}
