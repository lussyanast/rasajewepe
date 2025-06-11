<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'testimony_id';

    protected $fillable = ['user_id', 'name', 'message', 'approved'];
    public $timestamps = true;
}

