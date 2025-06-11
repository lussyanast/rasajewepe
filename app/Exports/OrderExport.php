<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    protected $from, $to;

    public function __construct($from = null, $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        $orders = Order::with('user', 'status', 'paymentStatus')
            ->when($this->from && $this->to, function ($q) {
                $q->whereBetween('event_date', [$this->from, $this->to]);
            })
            ->get();

        return view('admin.reports._table', compact('orders'));
    }
}
