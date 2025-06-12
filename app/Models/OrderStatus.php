<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
    protected $primaryKey = 'order_status_id';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status_id');
    }
}
