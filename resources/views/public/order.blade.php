@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Italiana', serif;">Form Pemesanan</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/order" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="menu_id" class="form-label">Pilih Menu</label>
                <select class="form-select" name="menu_id" id="menu_id" required>
                    <option disabled {{ !request('menu_id') ? 'selected' : '' }}>-- Pilih Menu --</option>
                    @foreach(\App\Models\Menu::all() as $menu)
                        <option value="{{ $menu->menu_id }}" {{ request('menu_id') == $menu->menu_id ? 'selected' : '' }}>
                            {{ $menu->catering_name }} - Rp{{ number_format($menu->price) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Pesanan</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required
                    value="{{ old('quantity') }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat Pengantaran</label>
                <textarea class="form-control" name="address" id="address" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Tambahan</label>
                <textarea class="form-control" name="notes" id="notes" rows="2">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn btn-dark px-4">Kirim Pemesanan</button>
        </form>
    </div>
@endsection