@extends('layouts.app')

@section('content')
    <h2>Update Status Pesanan</h2>

    <form action="{{ route('orders.update', $order->order_id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Status Pesanan</label>
            <select name="order_status_id" class="form-control">
                @foreach($statusList as $s)
                    <option value="{{ $s->order_status_id }}" {{ $order->order_status_id == $s->order_status_id ? 'selected' : '' }}>
                        {{ $s->status_desc }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="payment_status_id" class="form-control">
                @foreach($paymentList as $p)
                    <option value="{{ $p->payment_status_id }}" {{ $order->payment_status_id == $p->payment_status_id ? 'selected' : '' }}>
                        {{ $p->payment_desc }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
