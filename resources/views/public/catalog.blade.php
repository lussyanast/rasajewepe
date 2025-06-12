@extends('layouts.app')

@section('content')
    <div class="text-center my-5">
        <h1 class="mb-3" style="font-family: 'Italiana', serif;">Katalog Menu Catering</h1>
        <p class="lead">Pilih menu terbaik untuk acara Anda</p>
    </div>

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;" alt="{{ $menu->catering_name }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $menu->catering_name }}</h5>
                        <p class="card-text small text-muted">{{ $menu->description }}</p>
                        <p class="fw-bold mb-3">Rp{{ number_format($menu->final_price, 0, ',', '.') }}</p>
                        <a href="{{ url('/order?menu_id=' . $menu->menu_id) }}" class="btn btn-dark mt-auto">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <p class="text-muted">Belum ada menu tersedia.</p>
            </div>
        @endforelse
    </div>
@endsection