<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    protected $primaryKey = 'payment_method_id';

    protected $fillable = ['payment_name', 'is_active'];

    public $timestamps = true;
}
