@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Daftar Pesanan</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Tanggal Acara</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $o)
                    <tr>
                        <td>{{ $o->user->full_name ?? '-' }}</td>
                        <td>{{ $o->event_date }}</td>
                        <td>
                            <span class="badge bg-{{ $o->status->status_desc == 'Selesai' ? 'success' : 'warning' }}">
                                {{ $o->status->status_desc ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $o->paymentStatus->payment_desc == 'Lunas' ? 'success' : 'secondary' }}">
                                {{ $o->paymentStatus->payment_desc ?? '-' }}
                            </span>
                        </td>
                        <td>Rp{{ number_format($o->total_price) }}</td>
                        <td>
                            <a href="{{ route('orders.show', $o->order_id) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('orders.edit', $o->order_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection