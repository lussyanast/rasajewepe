@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Daftar Menu Catering</h2>

    <div class="row">
        @forelse($menus as $menu)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="card-text"><strong>Rp{{ number_format($menu->price) }}</strong></p>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada menu tersedia.</p>
        @endforelse
    </div>
@endsection