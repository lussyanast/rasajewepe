@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Kelola Metode Pembayaran</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('payment-methods.create') }}" class="btn btn-primary mb-3">+ Tambah Metode</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama Metode</th>
                    <th>Status</th>
                    <th style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($methods as $method)
                    <tr>
                        <td>{{ $method->payment_name }}</td>
                        <td>
                            <form action="{{ route('payment-methods.toggle', $method->payment_method_id) }}" method="POST">
                                @csrf @method('PUT')
                                <button class="btn btn-sm {{ $method->is_active ? 'btn-success' : 'btn-secondary' }}">
                                    {{ $method->is_active ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('payment-methods.edit', $method->payment_method_id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('payment-methods.destroy', $method->payment_method_id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus metode ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection