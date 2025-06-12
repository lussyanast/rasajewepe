@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Edit Kategori</h4>

            <form action="{{ route('categories.update', $category->category_id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" required
                        value="{{ $category->category_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select" required>
                        <option value="Y" {{ $category->is_active === 'Y' ? 'selected' : '' }}>Aktif</option>
                        <option value="N" {{ $category->is_active === 'N' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection