@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Italiana', serif;">Galeri Dokumentasi</h2>

        @if($galleries->isEmpty())
            <p class="text-center">Belum ada dokumentasi yang tersedia.</p>
        @else
            <div class="row g-4">
                @foreach ($galleries as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Gallery Image">
                            @endif
                            @if ($item->caption)
                                <div class="card-body">
                                    <p class="card-text">{{ $item->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection