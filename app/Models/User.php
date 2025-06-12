<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'password',
        'role',
        'full_name',
        'email',
        'no_telp',
        'alamat',
        'photo',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    protected $hidden = [
        'password',
    ];


    public $timestamps = true;

    public function getAuthIdentifierName()
    {
        return 'username';
    }

}