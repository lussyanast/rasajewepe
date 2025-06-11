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
}
