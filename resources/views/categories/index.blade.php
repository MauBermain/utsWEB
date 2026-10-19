@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>
<table class="table table-bordered">
    <thead><tr><th>#</th><th>Nama</th><th>Jumlah Barang</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($categories as $c)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->items_count }}</td>
            <td>
                <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="text-center">Belum ada kategori.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection