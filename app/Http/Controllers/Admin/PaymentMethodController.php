<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('admin.payment-methods.index', compact('methods'));
    }

    public function create()
    {
        return view('admin.payment-methods.create');
    }

    public function store(Request $request)
    {
        $request->validate(['payment_name' => 'required|string|max:100']);
        PaymentMethod::create($request->only('payment_name') + ['is_active' => true]);
        return redirect()->route('payment-methods.index')->with('success', 'Metode pembayaran ditambahkan.');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment-methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate(['payment_name' => 'required|string|max:100']);
        $paymentMethod->update($request->only('payment_name'));
        return redirect()->route('payment-methods.index')->with('success', 'Metode diperbarui.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('payment-methods.index')->with('success', 'Metode dihapus.');
    }

    public function toggleStatus(PaymentMethod $paymentMethod)
    {
        $paymentMethod->is_active = !$paymentMethod->is_active;
        $paymentMethod->save();
        return back()->with('success', 'Status metode diperbarui.');
    }
}