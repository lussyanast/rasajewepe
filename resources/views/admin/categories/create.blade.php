@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Tambah Kategori</h4>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select" required>
                        <option value="Y">Aktif</option>
                        <option value="N">Nonaktif</option>
                    </select>
                </div>

                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection