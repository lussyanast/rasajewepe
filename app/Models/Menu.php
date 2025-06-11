<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'catering_menu';
    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'category_id',
        'catering_name',
        'description',
        'image',
        'portion',
        'price',
        'discount',
        'final_price',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(CategoryMenu::class, 'category_id');
    }
}
