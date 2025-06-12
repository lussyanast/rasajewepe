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
                    <th style="width: 180px;">Aksi</th>
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

                            @if($o->order_status_id == 1)
                                {{-- Menunggu Konfirmasi --}}
                                <form action="{{ route('orders.approve', $o->order_id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success"
                                        onclick="return confirm('Konfirmasi dan proses pesanan ini?')">
                                        Proses
                                    </button>
                                </form>
                            @elseif($o->order_status_id == 2)
                                {{-- Diproses --}}
                                <form action="{{ route('orders.markAsCompleted', $o->order_id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-primary"
                                        onclick="return confirm('Tandai pesanan ini sebagai selesai?')">
                                        Selesai
                                    </button>
                                </form>
                            @endif

                            {{-- Tombol Batalkan (hanya muncul jika belum selesai/dibatalkan) --}}
                            @if(in_array($o->order_status_id, [1, 2]))
                                <form action="{{ route('orders.cancel', $o->order_id) }}" method="POST" class="d-inline ms-1">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Batalkan pesanan ini?')">
                                        Batalkan
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection