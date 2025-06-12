@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Laporan Pemesanan</h2>

    {{-- Filter Form --}}
    <form method="GET" class="row g-3 mb-4 align-items-end">
        <div class="col-md-3">
            <label class="form-label">Dari Tanggal</label>
            <input type="date" name="from" value="{{ request('from') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Sampai Tanggal</label>
            <input type="date" name="to" value="{{ request('to') }}" class="form-control">
        </div>
        <div class="col-md-6 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-funnel-fill me-1"></i> Tampilkan
            </button>
            <a href="{{ route('reports.export.excel', request()->only('from', 'to')) }}" class="btn btn-success">
                <i class="bi bi-file-earmark-excel-fill me-1"></i> Excel
            </a>
            <a href="{{ route('reports.export.pdf', request()->only('from', 'to')) }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf-fill me-1"></i> PDF
            </a>
        </div>
    </form>

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
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
                        <td class="text-start">{{ $order->user->full_name ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $order->status->status_desc == 'Selesai' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $order->status->status_desc ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $order->paymentStatus->payment_desc == 'Lunas' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $order->paymentStatus->payment_desc ?? '-' }}
                            </span>
                        </td>
                        <td class="fw-semibold">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data ditemukan untuk rentang tanggal tersebut.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
