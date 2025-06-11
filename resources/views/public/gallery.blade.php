@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Galeri Menu</h2>

    <div class="row">
        @forelse($galleries as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $item->caption }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada gambar galeri.</p>
        @endforelse
    </div>
@endsection
