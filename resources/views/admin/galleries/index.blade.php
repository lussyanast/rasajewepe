@extends('layouts.app')

@section('content')
    <h2>Kelola Galeri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <p>{{ $gallery->caption }}</p>
                        <p>Status: <strong>{{ $gallery->approved ? 'Disetujui' : 'Menunggu' }}</strong></p>
                        @if(!$gallery->approved)
                            <form action="{{ route('galleries.approve', $gallery->galeri_id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success">Setujui</button>
                            </form>
                        @endif
                        <form action="{{ route('galleries.destroy', $gallery->galeri_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus gambar ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada gambar.</p>
        @endforelse
    </div>
@endsection
