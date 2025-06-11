@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Laporan Pemesanan</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="date" name="from" value="{{ request('from') }}" class="form-control" placeholder="Dari tanggal">
        </div>
        <div class="col-md-3">
            <input type="date" name="to" value="{{ request('to') }}" class="form-control" placeholder="Sampai tanggal">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <a href="{{ route('reports.export.excel', request()->only('from', 'to')) }}" class="btn btn-success w-50">
                Export Excel
            </a>
            <a href="{{ route('reports.export.pdf', request()->only('from', 'to')) }}" class="btn btn-danger w-50">
                Export PDF
            </a>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal Acara</th>
                <th>Nama Pemesan</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->event_date }}</td>
                    <td>{{ $order->user->full_name ?? '-' }}</td>
                    <td>{{ $order->status->status_desc ?? '-' }}</td>
                    <td>{{ $order->paymentStatus->payment_desc ?? '-' }}</td>
                    <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection