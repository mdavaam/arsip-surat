@extends('layouts.app')

@section('title', 'Upload Surat')

@section('content')
<div class="page-header">
    <h2>Arsip Surat >> Unggah</h2>
    <p class="text-muted">Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
    Catatan:</p>
    <ul class="text-muted">
        <li>Gunakan file berformat PDF</li>
    </ul>
</div>

<form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" 
                       id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                @error('nomor_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select @error('kategori_id') is-invalid @enderror" 
                        id="kategori_id" name="kategori_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" 
                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <textarea class="form-control @error('judul') is-invalid @enderror" 
                          id="judul" name="judul" rows="3" required>{{ old('judul') }}</textarea>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file_surat" class="form-label">File Surat (PDF)</label>
                <div class="input-group">
                    <input type="file" class="form-control @error('file_surat') is-invalid @enderror" 
                           id="file_surat" name="file_surat" accept=".pdf" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('file_surat').click()">Browse File...</button>
                </div>
                @error('file_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection