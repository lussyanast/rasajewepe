@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Formulir Pemesanan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/order" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Pemesan</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="menu_id" class="form-label">Menu</label>
            <select name="menu_id" class="form-control" required>
                @foreach(App\Models\Menu::all() as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat Pengiriman</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan Tambahan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
    </form>
@endsection
