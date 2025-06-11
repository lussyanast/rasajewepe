<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    protected $table = 'category_menu';
    protected $primaryKey = 'category_id';

    protected $fillable = ['category_name', 'is_active'];

    public $timestamps = true;
}
