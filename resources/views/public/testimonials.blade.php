@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Italiana', serif;">Testimoni Pelanggan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- LIST TESTIMONI --}}
        <div class="row justify-content-center mb-5">
            @forelse ($testimonials as $testi)
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>"{{ $testi->message }}"</p>
                                <footer class="blockquote-footer mt-2">
                                    {{ $testi->user->full_name ?? 'Pengguna' }}
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada testimoni tersedia.</p>
            @endforelse
        </div>

        {{-- FORM TESTIMONI - HANYA JIKA LOGIN --}}
        @auth
            <div class="col-md-8 mx-auto">
                <h4 class="mb-3 text-center">Kirim Testimoni Anda</h4>
                <form method="POST" action="/testimonials">
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan / Ulasan</label>
                        <textarea name="message" id="message" rows="4" required
                            class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Kirim Testimoni</button>
                </form>
            </div>
        @else
            <div class="text-center mt-4">
                <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk mengirim testimoni.</p>
            </div>
        @endauth
    </div>
@endsection