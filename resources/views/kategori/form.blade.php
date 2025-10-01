@extends('layouts.app')

@section('title', isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<div class="page-header">
    <h2>Kategori Surat >> {{ isset($kategori) ? 'Edit' : 'Tambah' }}</h2>
    <p class="text-muted">{{ isset($kategori) ? 'Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"' : 'Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"' }}</p>
</div>

<form action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
    @csrf
    @if(isset($kategori))
        @method('PUT')
    @endif
    
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label for="id" class="form-label">ID (Auto Increment)</label>
                <input type="text" class="form-control" id="id" 
                       value="{{ isset($kategori) ? $kategori->id : 'Auto Generate' }}" 
                       readonly>
            </div>

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                       id="nama_kategori" name="nama_kategori" 
                       value="{{ old('nama_kategori', isset($kategori) ? $kategori->nama_kategori : '') }}" 
                       required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Judul</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                          id="keterangan" name="keterangan" rows="4">{{ old('keterangan', isset($kategori) ? $kategori->keterangan : '') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection