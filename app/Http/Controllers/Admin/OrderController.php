<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'status', 'paymentStatus'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items.menu'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statusList = OrderStatus::all();
        $paymentList = PaymentStatus::all();
        return view('admin.orders.edit', compact('order', 'statusList', 'paymentList'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status_id = $request->order_status_id;
        $order->payment_status_id = $request->payment_status_id;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Status pesanan diperbarui.');
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);

        // Cek jika belum diproses
        if ($order->order_status_id == 1) {
            $order->order_status_id = 2;
            $order->payment_status_id = 2;
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Pesanan dikonfirmasi dan sedang diproses.');
        }

        return redirect()->route('orders.index')->with('info', 'Pesanan sudah diproses.');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status_id = 4;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
    }

    public function markAsCompleted($id)
    {
        $order = Order::findOrFail($id);

        if ($order->order_status_id == 2) {
            $order->order_status_id = 3;
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Pesanan telah ditandai sebagai selesai.');
        }

        return redirect()->route('orders.index')->with('info', 'Pesanan belum dalam tahap pemrosesan.');
    }


}
