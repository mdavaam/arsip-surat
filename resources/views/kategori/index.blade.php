@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="page-header">
    <h2>Kategori Surat</h2>
    <p class="text-muted">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
    Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <form method="GET" action="{{ route('kategori.index') }}" class="d-flex">
            <label for="search" class="form-label me-3 mt-2">Cari kategori:</label>
            <input type="text" name="search" id="search" class="form-control me-2" 
                   placeholder="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari!</button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->keterangan }}</td>
                <td>
                    <button class="btn btn-danger btn-sm btn-action" 
                            onclick="confirmDelete({{ $kategori->id }})">Hapus</button>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" 
                       class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data kategori</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    <a href="{{ route('kategori.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah Kategori Baru...
    </a>
</div>

<!-- Form hidden untuk delete -->
@foreach($kategoris as $kategori)
<form id="delete-form-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endforeach

@endsection

@section('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Alert',
        text: 'Apakah Anda yakin ingin menghapus kategori ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endsection