@extends('layouts.app')

@section('content')
    {{-- HERO FULL WIDTH --}}
    <div class="w-100 position-relative text-white mb-5"
        style="height: 100vh; background-image: url('{{ asset('content.jpg') }}'); background-size: cover; background-position: center;">
        <div class="position-absolute top-50 start-50 translate-middle text-center px-3" style="z-index: 1;">
            <h1 class="mb-3 display-4" style="font-family: 'Italiana', serif; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
                Selamat Datang di RasaJeWePe</h1>
            <p class="lead mb-4" style="text-shadow: 1px 1px 5px rgba(0,0,0,0.4);">Layanan catering premium untuk acara
                spesial Anda</p>
            <a href="/catalog" class="btn btn-light btn-lg shadow-sm">Lihat Menu Catering</a>
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.4; z-index: 0;"></div>
    </div>

    {{-- SECTION KEUNGGULAN --}}
    <div class="container">
        <div class="row text-center my-5">
            <div class="col-md-4 mb-4">
                <div class="p-4 h-100 shadow-sm border rounded">
                    <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Bahan" width="64" class="mb-3">
                    <h5 class="fw-bold">Bahan Berkualitas</h5>
                    <p class="mb-0">Menggunakan bahan segar dan halal untuk setiap hidangan yang disajikan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 h-100 shadow-sm border rounded">
                    <img src="https://cdn-icons-png.flaticon.com/512/2920/2920244.png" alt="Waktu" width="64" class="mb-3">
                    <h5 class="fw-bold">Pengiriman Tepat Waktu</h5>
                    <p class="mb-0">Kami pastikan pesanan Anda tiba sesuai jadwal dan kondisi terbaik.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 h-100 shadow-sm border rounded">
                    <img src="https://cdn-icons-png.flaticon.com/512/1905/1905256.png" alt="Menu" width="64" class="mb-3">
                    <h5 class="fw-bold">Pilihan Menu Lengkap</h5>
                    <p class="mb-0">Tersedia berbagai paket prasmanan, nasi kotak, dan snack box sesuai kebutuhan.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION TESTIMONI --}}
    <div class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Apa Kata Pelanggan?</h2>

            <div class="row justify-content-center">
                @forelse ($testimonials as $testi)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="card-text">"{{ $testi->message }}"</p>
                                <footer class="blockquote-footer mt-3 text-end">
                                    {{ $testi->user->full_name ?? 'Pengguna' }}
                                </footer>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada testimoni pelanggan yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- CTA SECTION --}}
    <div class="py-5 mb-0" style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); color: #fff;">
        <div class="container d-flex flex-column align-items-center text-center">
            <h2 class="mb-3 display-5" style="font-family: 'Italiana', serif;">Siap Memesan untuk Acara Anda?</h2>
            <p class="lead mb-4 px-2" style="max-width: 700px;">
                Jadikan momen istimewa Anda lebih berkesan bersama RasaJeWePe — layanan catering terpercaya dengan rasa dan
                pelayanan terbaik.
            </p>
            <a href="/order" class="btn btn-outline-light btn-lg px-5 py-2 rounded-pill shadow-sm"
                style="transition: 0.3s ease;">
                Pesan Sekarang
            </a>
        </div>
    </div>
@endsection