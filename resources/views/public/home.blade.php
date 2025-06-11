@extends('layouts.app')

@section('content')
    <div class="text-center my-5">
        <h1 class="mb-3" style="font-family: 'Italiana', serif;">Selamat Datang di RasaJeWePe</h1>
        <p class="lead">Layanan catering pilihan Anda.</p>
        <a href="/catalog" class="btn btn-outline-dark mt-3">Lihat Menu Catering</a>
    </div>

    <div class="row text-center my-5">
        <div class="col-md-4 mb-4">
            <h4 class="fw-bold">Bahan Berkualitas</h4>
            <p>Kami hanya menggunakan bahan segar, bersih, dan halal dalam setiap masakan kami.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h4 class="fw-bold">Pengiriman Tepat Waktu</h4>
            <p>Jaminan tepat waktu dalam setiap pengantaran ke lokasi Anda.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h4 class="fw-bold">Varian Menu</h4>
            <p>Pilihan menu lengkap mulai dari prasmanan hingga kotakan, sesuai selera dan kebutuhan acara Anda.</p>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="mb-4">Apa Kata Pelanggan?</h2>
        <blockquote class="blockquote">
            <p class="mb-0">"Makanannya enak, tampilannya cantik, dan pengirimannya tepat waktu. Sangat recommended!"</p>
            <footer class="blockquote-footer mt-2">Fitri, Jakarta Selatan</footer>
        </blockquote>
    </div>
@endsection