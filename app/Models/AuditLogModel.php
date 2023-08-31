<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogModel extends Model
{
    use HasFactory;
  
    protected $table = 'auditlog';
    protected $fillable = [ 'user_id', 'activity', 'description' ];

    public function UserLog()
    {
      return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }  
}
