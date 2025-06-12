<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validasi data input sesuai dengan kolom di tabel users
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', 'min:8'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date'],
            'no_telp' => ['required', 'string'],
            'alamat' => ['required', 'string'],
        ]);

        // Menyimpan data pengguna baru
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'full_name' => $request->full_name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'photo' => $request->photo ?? null,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
    }
}
