@extends('layouts.app')

@section('content')
    <h2>Kelola Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->catering_name }}</td>
                    <td>{{ $menu->category->category_name ?? '-' }}</td>
                    <td>Rp{{ number_format($menu->final_price) }}</td>
                    <td>{{ $menu->is_active == 'Y' ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->menu_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->menu_id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus menu ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
