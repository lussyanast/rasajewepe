<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ⬇️ Gunakan nama kolom primary key di database
    protected $primaryKey = 'user_id';

    // ⬇️ Kalau bukan auto-increment integer default
    public $incrementing = true;
    protected $keyType = 'int';

    // ⬇️ Kolom yang bisa diisi
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

    // ⬇️ Kolom yang tidak boleh ditampilkan langsung
    protected $hidden = [
        'password',
    ];

    // ⬇️ Matikan kolom default Laravel jika tidak ada
    public $timestamps = true;

    // Jika tidak menggunakan `remember_token`, bisa abaikan
}