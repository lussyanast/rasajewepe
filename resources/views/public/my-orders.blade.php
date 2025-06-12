@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4 text-center" style="font-family: 'Italiana', serif;">Riwayat Pemesanan Anda</h3>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">Belum ada riwayat pemesanan.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal Acara</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ Carbon::parse($order->event_date)->format('d M Y H:i') }}</td>
                                <td>
                                    @foreach($order->items as $item)
                                        <div>{{ $item->menu->catering_name ?? '-' }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($order->items as $item)
                                        <div>{{ $item->quantity }} porsi</div>
                                    @endforeach
                                </td>
                                <td>Rp{{ number_format($order->total_price) }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->status->status_desc == 'Selesai' ? 'success' : 'warning' }}">
                                        {{ $order->status->status_desc ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $order->paymentStatus->payment_desc == 'Lunas' ? 'success' : 'secondary' }}">
                                        {{ $order->paymentStatus->payment_desc ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection