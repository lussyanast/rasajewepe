@extends('layouts.app')

@section('content')
    <h2>Detail Pesanan</h2>

    <p><strong>Nama:</strong> {{ $order->user->full_name ?? '-' }}</p>
    <p><strong>Tanggal Acara:</strong> {{ $order->event_date }}</p>
    <p><strong>Status:</strong> {{ $order->status->status_desc ?? '-' }}</p>
    <p><strong>Pembayaran:</strong> {{ $order->paymentStatus->payment_desc ?? '-' }}</p>

    <hr>
    <h4>Item Pesanan</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->menu->catering_name ?? '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp{{ number_format($item->subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
