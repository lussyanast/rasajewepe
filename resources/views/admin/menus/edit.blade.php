@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Edit Menu</h4>

            <form action="{{ route('menus.update', $menu->menu_id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" name="catering_name" class="form-control" required
                        value="{{ $menu->catering_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $menu->category_id == $category->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Gambar Baru (Opsional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="menu" class="img-thumbnail mt-2" width="120">
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control" value="{{ $menu->price }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Diskon</label>
                        <input type="number" name="discount" class="form-control" value="{{ $menu->discount }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Harga Akhir</label>
                        <input type="number" name="final_price" class="form-control" value="{{ $menu->final_price }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Porsi</label>
                        <input type="number" name="portion" class="form-control" value="{{ $menu->portion }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="Y" {{ $menu->is_active === 'Y' ? 'selected' : '' }}>Aktif</option>
                            <option value="N" {{ $menu->is_active === 'N' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $menu->description }}</textarea>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection