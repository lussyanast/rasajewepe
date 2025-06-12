@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4 class="mb-4">Tambah Metode Pembayaran</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payment-methods.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="payment_name" class="form-label">Nama Metode</label>
                <input type="text" class="form-control" id="payment_name" name="payment_name" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('payment-methods.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection