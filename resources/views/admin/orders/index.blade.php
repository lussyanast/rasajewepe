@extends('layouts.app')

@section('content')
    <h2>Daftar Pesanan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pemesan</th>
                <th>Tanggal Acara</th>
                <th>Status</th>
                <th>Bayar</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $o)
                <tr>
                    <td>{{ $o->user->full_name ?? '-' }}</td>
                    <td>{{ $o->event_date }}</td>
                    <td>{{ $o->status->status_desc ?? '-' }}</td>
                    <td>{{ $o->paymentStatus->payment_desc ?? '-' }}</td>
                    <td>Rp{{ number_format($o->total_price) }}</td>
                    <td>
                        <a href="{{ route('orders.show', $o->order_id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('orders.edit', $o->order_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
