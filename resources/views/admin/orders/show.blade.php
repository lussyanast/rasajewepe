@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Detail Pesanan</h4>

    <div class="mb-4">
        <p><strong>Nama:</strong> {{ $order->user->full_name ?? '-' }}</p>
        <p><strong>Tanggal Acara:</strong> {{ $order->event_date }}</p>
        <p><strong>Status:</strong>
            <span
                class="badge bg-{{ $order->status->status_desc == 'Selesai' ? 'success' : ($order->status->status_desc == 'Dibatalkan' ? 'danger' : 'warning') }}">
                {{ $order->status->status_desc ?? '-' }}
            </span>
        </p>
        <p><strong>Pembayaran:</strong>
            <span class="badge bg-{{ $order->paymentStatus->payment_desc == 'Lunas' ? 'success' : 'secondary' }}">
                {{ $order->paymentStatus->payment_desc ?? '-' }}
            </span>
        </p>
        <p><strong>Alamat Pengiriman:</strong> {{ $order->address ?? '-' }}</p>
        <p><strong>Catatan Tambahan:</strong> {{ $order->notes ?? '-' }}</p>
    </div>

    <hr>
    <h5 class="mb-3">Item Pesanan</h5>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
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

    <div class="text-end mt-3">
        <h5>Total Harga: <strong>Rp{{ number_format($order->total_price) }}</strong></h5>
    </div>
@endsection