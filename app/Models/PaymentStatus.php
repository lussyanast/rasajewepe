<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';
    protected $primaryKey = 'payment_status_id';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_status_id');
    }
}
