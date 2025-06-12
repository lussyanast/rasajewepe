@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Kelola Menu</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->catering_name }}</td>
                        <td>{{ $menu->category->category_name ?? '-' }}</td>
                        <td>Rp{{ number_format($menu->final_price) }}</td>
                        <td>
                            <span class="badge bg-{{ $menu->is_active === 'Y' ? 'success' : 'secondary' }}">
                                {{ $menu->is_active === 'Y' ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('menus.edit', $menu->menu_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->menu_id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
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