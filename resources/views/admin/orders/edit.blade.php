@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Update Status Pesanan</h4>

            <form action="{{ route('orders.update', $order->order_id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Status Pesanan</label>
                    <select name="order_status_id" class="form-select">
                        @foreach($statusList as $s)
                            <option value="{{ $s->order_status_id }}" {{ $order->order_status_id == $s->order_status_id ? 'selected' : '' }}>
                                {{ $s->status_desc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Pembayaran</label>
                    <select name="payment_status_id" class="form-select">
                        @foreach($paymentList as $p)
                            <option value="{{ $p->payment_status_id }}" {{ $order->payment_status_id == $p->payment_status_id ? 'selected' : '' }}>
                                {{ $p->payment_desc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection