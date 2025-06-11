@extends('layouts.app')

@section('content')
    <div class="text-center my-5">
        <h1 class="mb-3" style="font-family: 'Italiana', serif;">Katalog Menu Catering</h1>
        <p class="lead">Pilih menu terbaik untuk acara Anda</p>
    </div>

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="fw-bold">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada menu tersedia.</p>
        @endforelse
    </div>
@endsection