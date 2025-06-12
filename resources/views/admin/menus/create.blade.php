@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Tambah Menu</h4>

            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" name="catering_name" class="form-control" required
                        value="{{ old('catering_name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Gambar Menu</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Diskon</label>
                        <input type="number" name="discount" class="form-control" value="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Harga Akhir</label>
                        <input type="number" name="final_price" class="form-control" required
                            value="{{ old('final_price') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Porsi</label>
                        <input type="number" name="portion" class="form-control" value="{{ old('portion') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="Y">Aktif</option>
                            <option value="N">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection