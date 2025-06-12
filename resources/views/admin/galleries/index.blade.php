@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Kelola Galeri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top object-fit-cover"
                            alt="gambar galeri" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="fw-semibold">{{ $gallery->caption }}</h6>
                        <div class="mb-2">
                            <span class="badge {{ $gallery->approved ? 'bg-success' : 'bg-secondary' }}">
                                {{ $gallery->approved ? 'Disetujui' : 'Menunggu' }}
                            </span>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            @if(!$gallery->approved)
                                <form action="{{ route('galleries.approve', $gallery->galeri_id) }}" method="POST" class="w-100">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-success w-100">Setujui</button>
                                </form>
                            @endif
                            <form action="{{ route('galleries.destroy', $gallery->galeri_id) }}" method="POST"
                                onsubmit="return confirm('Hapus gambar ini?')" class="w-100">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada gambar dalam galeri.</div>
            </div>
        @endforelse
    </div>
@endsection