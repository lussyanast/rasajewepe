@extends('layouts.admin')

@section('content')
    <h4 class="mb-4">Kelola Testimoni</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $item)
                    <tr>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ Str::limit($item->message, 80) }}</td>
                        <td>
                            <span class="badge bg-{{ $item->approved ? 'success' : 'secondary' }}">
                                {{ $item->approved ? 'Disetujui' : 'Menunggu' }}
                            </span>
                        </td>
                        <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @if(!$item->approved)
                                    <form action="{{ route('testimonials.approve', $item->testimony_id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Setujui</button>
                                    </form>
                                @endif

                                <form action="{{ route('testimonials.destroy', $item->testimony_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus testimoni ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection