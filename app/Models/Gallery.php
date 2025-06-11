<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'galeri_id';

    protected $fillable = ['user_id', 'image', 'caption', 'approved'];
    public $timestamps = true;
}
