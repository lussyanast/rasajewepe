@extends('layouts.app')

@section('content')
    <h2>Kelola Testimoni</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $item)
                <tr>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>{{ $item->message }}</td>
                    <td>{{ $item->approved ? 'Disetujui' : 'Menunggu' }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @if(!$item->approved)
                            <form action="{{ route('testimonials.approve', $item->testimony_id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-sm btn-success">Setujui</button>
                            </form>
                        @endif

                        <form action="{{ route('testimonials.destroy', $item->testimony_id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus testimoni ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
