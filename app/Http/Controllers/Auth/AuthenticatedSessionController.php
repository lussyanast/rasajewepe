<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    // Proses login
    public function store(Request $request)
    {
        // Validasi data input untuk 'username' dan 'password'
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'min:8'],
        ]);

        // Mencoba login menggunakan username dan password
        if (Auth::attempt($request->only('username', 'password'))) {
            // Jika login berhasil, regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman yang diminta atau ke halaman utama
            return redirect()->intended('/');
        }

        // Jika login gagal, kembali dengan error
        return back()->withErrors([
            'username' => 'The provided credentials are incorrect.',
        ]);
    }

    // Logout pengguna
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
