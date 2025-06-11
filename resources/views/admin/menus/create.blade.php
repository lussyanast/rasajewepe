@extends('layouts.app')

@section('content')
    <h2>Tambah Menu</h2>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="catering_name">Nama Menu</label>
            <input type="text" name="catering_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="discount" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Harga Akhir</label>
            <input type="number" name="final_price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Porsi</label>
            <input type="number" name="portion" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="Y">Aktif</option>
                <option value="N">Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
