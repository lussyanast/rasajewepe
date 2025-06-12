<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)
            ->where('role', 'admin')
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('admin_id', $user->user_id);
            Session::put('admin_name', $user->full_name);
            Session::put('admin_role', $user->role);
            return redirect('/admin/dashboard');
        }

        return redirect('/admin/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin/login')->with('success', 'Anda telah logout');
    }
}