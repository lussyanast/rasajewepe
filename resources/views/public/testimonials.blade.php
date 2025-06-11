@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Testimoni Pelanggan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/testimonials" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Anda</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Pesan Testimoni</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
    </form>

    <div class="list-group">
        @forelse($testimonials as $item)
            <div class="list-group-item">
                <strong>{{ $item->name }}</strong>
                <p>{{ $item->message }}</p>
            </div>
        @empty
            <p>Belum ada testimoni ditampilkan.</p>
        @endforelse
    </div>
@endsection
