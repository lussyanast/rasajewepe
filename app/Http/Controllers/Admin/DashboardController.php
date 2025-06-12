<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_id') || session('admin_role') !== 'admin') {
            return redirect('/admin/login')->with('error', 'Silakan login sebagai admin.');
        }

        // Ambil jumlah pesanan per hari (7 hari terakhir)
        $orders = DB::table('orders')
            ->selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
            ->whereDate('created_at', '>=', now()->subDays(6))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $dates = $orders->pluck('tanggal');
        $totals = $orders->pluck('total');

        return view('admin.dashboard', compact('dates', 'totals'));
    }
}
