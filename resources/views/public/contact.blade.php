@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4" style="font-family: 'Italiana', serif;">Hubungi Kami</h3>

                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="/contact">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Anda</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        placeholder="contoh@email.com" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea name="message" id="message" rows="5" class="form-control" required
                                    placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-whatsapp me-1"></i> Kirim Pesan via WhatsApp
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="small text-muted mb-0">Kami akan membalas pesan Anda secepat mungkin.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection