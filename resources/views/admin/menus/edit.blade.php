@extends('layouts.app')

@section('content')
    <h2>Edit Menu</h2>

    <form action="{{ route('menus.update', $menu->menu_id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Menu</label>
            <input type="text" name="catering_name" class="form-control" value="{{ $menu->catering_name }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}" {{ $menu->category_id == $category->category_id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $menu->price }}">
        </div>

        <div class="mb-3">
            <label>Diskon</label>
            <input type="number" name="discount" class="form-control" value="{{ $menu->discount }}">
        </div>

        <div class="mb-3">
            <label>Harga Akhir</label>
            <input type="number" name="final_price" class="form-control" value="{{ $menu->final_price }}">
        </div>

        <div class="mb-3">
            <label>Porsi</label>
            <input type="number" name="portion" class="form-control" value="{{ $menu->portion }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="Y" {{ $menu->is_active == 'Y' ? 'selected' : '' }}>Aktif</option>
                <option value="N" {{ $menu->is_active == 'N' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
