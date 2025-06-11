<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('user', 'status', 'paymentStatus')->orderBy('event_date', 'desc');

        // Filter tanggal
        if ($request->filled('from') && $request->filled('to')) {
            $orders->whereBetween('event_date', [$request->from, $request->to]);
        }

        $orders = $orders->get();

        return view('admin.reports.index', compact('orders'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(
            new OrderExport($request->from, $request->to),
            'laporan_pesanan.xlsx'
        );
    }

    public function exportPdf(Request $request)
    {
        $orders = Order::with('user', 'status', 'paymentStatus')
            ->when($request->filled(['from', 'to']), function ($q) use ($request) {
                $q->whereBetween('event_date', [$request->from, $request->to]);
            })
            ->get();

        $pdf = Pdf::loadView('admin.reports._table', compact('orders'));
        return $pdf->download('laporan_pesanan.pdf');
    }

}