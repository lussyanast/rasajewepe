@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Kategori Menu</h4>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Kategori</th>
                <th>Status</th>
                <th style="width: 130px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{ $c->category_name }}</td>
                    <td>
                        <span class="badge bg-{{ $c->is_active === 'Y' ? 'success' : 'secondary' }}">
                            {{ $c->is_active === 'Y' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $c->category_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $c->category_id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection