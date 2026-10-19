@extends('layouts.app')
@section('content')
<h3>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h3>
<form method="POST"
      action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}">
    @csrf
    @if(isset($category)) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection