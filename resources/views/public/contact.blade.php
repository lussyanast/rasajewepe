@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4" style="font-family: 'Italiana', serif;">Hubungi Kami</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/contact">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Anda</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" id="email" required class="form-control"
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea name="message" id="message" rows="4" required
                            class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Kirim Pesan via WhatsApp</button>
                </form>
            </div>
        </div>
    </div>
@endsection